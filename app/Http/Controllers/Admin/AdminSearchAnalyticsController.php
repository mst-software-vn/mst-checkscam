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
            ->select('search_query', DB::raw('COUNT(*) as search_count'))
            ->groupBy('search_query')
            ->orderByDesc('search_count')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                $reportCount = Report::where('target_id', $item->search_query)
                    ->where('status', 'approved')
                    ->count();

                $pendingCount = Report::where('target_id', $item->search_query)
                    ->where('status', 'pending')
                    ->count();

                return (object) [
                    'search_query' => $item->search_query,
                    'search_count' => $item->search_count,
                    'report_count' => $reportCount,
                    'pending_count' => $pendingCount,
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
