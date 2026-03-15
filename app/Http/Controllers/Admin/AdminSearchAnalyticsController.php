<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Support\Facades\DB;

class AdminSearchAnalyticsController extends Controller
{
    public function index()
    {
        $totalSearches = SearchLog::count();
        $searchesToday = SearchLog::whereDate('created_at', today())->count();

        $foundCount = SearchLog::where('is_found', true)->count();
        $foundRate = $totalSearches > 0
            ? round(($foundCount / $totalSearches) * 100)
            : 0;

        $hotTargets = SearchLog::where('created_at', '>=', now()->subDays(30))
            ->select('search_query', DB::raw('COUNT(*) as search_count'), DB::raw('MAX(created_at) as last_searched_at'), DB::raw('MAX(ip_address) as last_ip'))
            ->groupBy('search_query')
            ->orderByDesc('search_count')
            ->paginate(10)
            ->through(function ($item) {
                $reportCount = Report::where('target_id', $item->search_query)
                    ->where('status', 'approved')
                    ->count();

                return (object) [
                    'search_query' => $item->search_query,
                    'search_count' => $item->search_count,
                    'report_count' => $reportCount,
                    'last_ip' => $item->last_ip,
                    'last_searched_at' => $item->last_searched_at,
                ];
            });

        $recentSearches = SearchLog::latest()
            ->limit(20)
            ->get();

        return view('admin.search-analytics.index', compact(
            'totalSearches',
            'searchesToday',
            'foundRate',
            'hotTargets',
            'recentSearches',
        ));
    }
}
