<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));
        $results = collect();
        $isFound = false;
        $type = null;

        if ($query !== '') {
            [$type, $formattedQuery] = detectQueryType($query);
            $normalizedQuery = normalizeString($formattedQuery);

            $dbQuery = Report::where('status', 'approved')
                ->with('comments')
                ->when(in_array($type, ['phone', 'bank']), function ($q) use ($formattedQuery) {
                    $q->whereRaw("REGEXP_REPLACE(target_id, '[^0-9]', '') = ?", [$formattedQuery]);
                })
                ->when($type === 'facebook', function ($q) use ($formattedQuery, $query) {
                    $q->where(function ($sub) use ($formattedQuery, $query) {
                        $sub->where('target_id', 'LIKE', "%{$formattedQuery}%")
                            ->orWhere('slug', 'LIKE', "%{$formattedQuery}%")
                            ->orWhere('target_name', 'LIKE', "%{$query}%");
                    });
                })
                ->when($type === 'uuid', function ($q) use ($formattedQuery) {
                    $q->where('slug', $formattedQuery);
                })
                ->when($type === 'name', function ($q) use ($normalizedQuery) {
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

            $results = $dbQuery->paginate(10)->withQueryString();
            $isFound = $results->total() > 0;

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

        $topWeeklyReports = getTopWeeklyReports();
        $topDailySearches = getTopDailySearches();

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

        [$type, $formattedQuery] = detectQueryType($query);

        $suggestions = Report::where('status', 'approved')
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
                'label' => $r->target_id.($r->target_name ? " — {$r->target_name}" : ''),
                'value' => $r->target_id,
                'type' => $r->type,
                'target_name' => $r->target_name,
                'slug' => $r->slug,
            ]);

        return response()->json($suggestions);
    }

    public function clearHistory(Request $request)
    {
        SearchLog::where('ip_address', $request->ip())->delete();

        return back()->with('success', 'Đã xóa lịch sử tìm kiếm.');
    }
}
