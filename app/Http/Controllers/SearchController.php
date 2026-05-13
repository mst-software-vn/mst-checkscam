<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Helpers\StringHelper;
use App\Models\Report;
use App\Models\SearchLog;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));

        if ($query !== '') {
            $metaTitle = "Kết quả check scam: {$query} | Tra cứu lừa đảo";
            $metaDesc = "Dữ liệu mới nhất về {$query}. Xem đối tượng này có trong danh sách đen lừa đảo hay không. Tra cứu STK, SĐT, Link FB tại CheckScam.vn.";
            SEOTools::setTitle($metaTitle);
            SEOTools::setDescription($metaDesc);
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::metatags()->setCanonical(url()->current());
        } else {
            SEOTools::setTitle('Tìm kiếm đối tượng lừa đảo - CheckScam.vn');
            SEOTools::metatags()->addMeta('robots', 'noindex, follow');
        }

        $results = collect();
        $matchedInsurances = collect();
        $isFound = false;
        $type = null;

        if ($query !== '') {
            [$type, $formattedQuery] = StringHelper::detectQueryType($query);
            $normalizedQuery = StringHelper::normalizeString($formattedQuery);

            $dbQuery = Report::where('status', 'approved')
                ->with('comments')
                ->when(in_array($type, ['phone', 'bank']), function ($q) use ($formattedQuery) {
                    $q->whereRaw("REGEXP_REPLACE(target_id, '[^0-9]', '') = ?", [$formattedQuery]);
                })
                ->when($type == 'facebook', function ($q) use ($formattedQuery, $query) {
                    $q->where(function ($sub) use ($formattedQuery, $query) {
                        $sub->where('target_id', 'LIKE', "%{$formattedQuery}%")
                            ->orWhere('slug', 'LIKE', "%{$formattedQuery}%")
                            ->orWhere('target_name', 'LIKE', "%{$query}%");
                    });
                })
                ->when($type == 'uuid', function ($q) use ($formattedQuery) {
                    $q->where('slug', $formattedQuery);
                })
                ->when($type == 'name', function ($q) use ($normalizedQuery) {
                    $q->whereRaw(
                        "LOWER(TRIM(REGEXP_REPLACE(target_name, '\\\\s+', ' '))) = ?",
                        [$normalizedQuery],
                    );
                })
                ->orderByDesc('created_at');

            $matchedIds = (clone $dbQuery)->pluck('id');
            $ip = $request->ip();
            $searchCacheKey = 'search_'.md5($query).'_'.$ip;

            if ($matchedIds->isNotEmpty() && ! Cache::has($searchCacheKey)) {
                Report::whereIn('id', $matchedIds)->increment('search_count');
                Cache::put($searchCacheKey, true, now()->addHours(24));
            }

            $matchedInsurances = \App\Models\Insurance::where('status', 1)
                ->where(function ($q) use ($query, $formattedQuery, $normalizedQuery) {
                    $q->where('full_name', 'LIKE', "%{$query}%")
                        ->orWhereRaw("LOWER(TRIM(REGEXP_REPLACE(full_name, '\\\\s+', ' '))) LIKE ?", ["%{$normalizedQuery}%"])
                        ->orWhere('contact_info', 'LIKE', "%{$formattedQuery}%")
                        ->orWhere('payment_accounts', 'LIKE', "%{$formattedQuery}%")
                        ->orWhere('slug', 'LIKE', "%{$formattedQuery}%");
                })
                ->get()
                ->sortByDesc(function ($insurance) use ($normalizedQuery, $query, $formattedQuery) {
                    $normalizedName = StringHelper::normalizeString($insurance->full_name);
                    if ($normalizedName === $normalizedQuery || strcasecmp($insurance->full_name, $query) === 0) {
                        return 3;
                    }

                    if (
                        str_contains(json_encode($insurance->contact_info), '"'.$formattedQuery.'"') ||
                        str_contains(json_encode($insurance->payment_accounts), '"'.$formattedQuery.'"')
                    ) {
                        return 2;
                    }

                    return 1;
                })
                ->values();

            $results = $dbQuery->paginate(10)->withQueryString();
            $isFound = $results->total() > 0 || $matchedInsurances->isNotEmpty();

            $alreadyLogged = SearchLog::where('search_query', $query)
                ->where('ip_address', $ip)
                ->where('created_at', '>=', now()->subMinute())
                ->exists();

            if (! $alreadyLogged) {
                SearchLog::create([
                    'search_query' => $query,
                    'is_found' => $isFound,
                    'ip_address' => $ip,
                ]);
            }
        }

        $recentSearches = SearchLog::where('ip_address', $request->ip())
            ->orderByDesc('created_at')
            ->limit(10)
            ->pluck('search_query')
            ->unique()
            ->values();

        $stats = [
            'total_reports' => Report::where('status', 'approved')->count(),
            'total_account' => Report::where('status', 'approved')->where('type', 'account')->count(),
            'total_website' => Report::where('status', 'approved')->where('type', 'website')->count(),
        ];

        $topWeeklyReports = StatsHelper::getTopWeeklyReports();
        $topDailySearches = StatsHelper::getTopDailySearches();

        $page = $request->input('page', 1);
        if ($page == 1) {
            $perPage = 8;
            $offset = 0;
        } else {
            $perPage = 16;
            $offset = 8 + ($page - 2) * 16;
        }

        $commentsQuery = \App\Models\Comment::whereHas('report', function ($query) {
            $query->where('status', 'approved');
        })->with('report')->latest();

        $totalCommentsCount = $commentsQuery->count();
        $commentItems = $commentsQuery->skip($offset)->take($perPage)->get();

        $comments = new \Illuminate\Pagination\LengthAwarePaginator(
            $commentItems,
            $totalCommentsCount,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()],
        );

        return view('home', compact(
            'query',
            'results',
            'matchedInsurances',
            'isFound',
            'type',
            'recentSearches',
            'stats',
            'topWeeklyReports',
            'topDailySearches',
            'comments',
        ));
    }

    public function autoComplete(Request $request)
    {
        $query = trim((string) $request->get('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        [$type, $formattedQuery] = StringHelper::detectQueryType($query);

        $reportSuggestions = Report::where('status', 'approved')
            ->where(function ($q) use ($query, $formattedQuery) {
                $q->where('target_id', 'LIKE', "%{$formattedQuery}%")
                    ->orWhere('target_name', 'LIKE', "%{$query}%");
            })
            ->select('target_id', 'target_name', 'type', 'slug')
            ->limit(30)
            ->get()
            ->unique('target_id')
            ->take(8)
            ->values()
            ->map(fn ($r) => [
                'label' => $r->target_id.($r->target_name ? ' - '.StringHelper::mask_name($r->target_name) : ''),
                'value' => $r->target_id,
                'type' => $r->type,
                'target_name' => StringHelper::mask_name($r->target_name),
                'slug' => $r->slug,
            ]);

        $insuranceSuggestions = \App\Models\Insurance::where('status', 1)
            ->where(function ($q) use ($query, $formattedQuery) {
                $q->where('contact_info', 'LIKE', "%{$formattedQuery}%")
                    ->orWhere('payment_accounts', 'LIKE', "%{$formattedQuery}%")
                    ->orWhere('full_name', 'LIKE', "%{$query}%");
            })
            ->select('full_name', 'slug')
            ->limit(30)
            ->get()
            ->unique('full_name')
            ->take(4)
            ->values()
            ->map(fn ($i) => [
                'label' => 'Uy tín: '.$i->full_name,
                'value' => $i->full_name,
                'type' => 'insurance',
                'target_name' => $i->full_name,
                'slug' => $i->slug,
            ]);

        $suggestions = $insuranceSuggestions->concat($reportSuggestions)->take(8)->values();

        return response()->json($suggestions);
    }

    public function clearHistory(Request $request)
    {
        SearchLog::where('ip_address', $request->ip())->delete();

        return back()->with('success', 'Đã xóa lịch sử tìm kiếm.');
    }
}
