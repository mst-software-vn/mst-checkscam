<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));
        $results = collect();
        $isFound = false;
        $type    = null;

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
                        [$normalizedQuery]
                    );
                })
                ->orderByDesc('created_at');

            // tăng search_count với target_id
            $matchedIds = (clone $dbQuery)->pluck('id');
            if ($matchedIds->isNotEmpty()) {
                Report::whereIn('id', $matchedIds)->increment('search_count');
            }

            $results = $dbQuery->paginate(10)->withQueryString();
            $isFound = $results->total() > 0;

            // ghi lại lịch sử tìm kiếm vào search_logs table
            $ip = $request->ip();
            $alreadyLogged = SearchLog::where('search_query', $query)
                ->where('ip_address', $ip)
                ->where('created_at', '>=', now()->subMinute())
                ->exists();

            if (!$alreadyLogged) {
                SearchLog::create([
                    'search_query' => $query,
                    'is_found'     => $isFound,
                    'ip_address'   => $ip,
                ]);
            }
        }

        // -----------------------------------------------
        // lịch sử tìm kiếm gần đây của IP này (max 10)
        // -----------------------------------------------
        $recentSearches = SearchLog::where('ip_address', $request->ip())
            ->orderByDesc('created_at')
            ->limit(10)
            ->pluck('search_query')
            ->unique()
            ->values();

        // -----------------------------------------------
        // thống kê nhanh cho trang search (SAU NÀY CÓ THỂ ÁP DỤNG CACHE)
        // -----------------------------------------------
        $stats = [
            'total_reports' => Report::where('status', 'approved')->count(),
            'total_account' => Report::where('status', 'approved')->where('type', 'account')->count(),
            'total_website' => Report::where('status', 'approved')->where('type', 'website')->count(),
        ];

        $topWeeklyReports = getTopWeeklyReports();
        $topDailySearches = getTopDailySearches();

        return view('home', compact(
            'query',
            'results',
            'isFound',
            'type',
            'recentSearches',
            'stats',
            'topWeeklyReports',
            'topDailySearches'
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
            ->map(fn($r) => [
                'label'       => $r->target_id . ($r->target_name ? " — {$r->target_name}" : ''),
                'value'       => $r->target_id,
                'type'        => $r->type,
                'target_name' => $r->target_name,
                'slug'        => $r->slug,
            ]);

        return response()->json($suggestions);
    }

    public function clearHistory(Request $request)
    {
        SearchLog::where('ip_address', $request->ip())->delete();

        return back()->with('success', 'Đã xóa lịch sử tìm kiếm.');
    }
}
