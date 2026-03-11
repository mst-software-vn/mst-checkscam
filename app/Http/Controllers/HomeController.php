<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $stats = $this->getHomeStats();
        $latestReports = $this->getLatestReports();
        $topWeeklyReports = getTopWeeklyReports();
        $topDailySearches = getTopDailySearches();

        $recentSearches = SearchLog::where('ip_address', $request->ip())
            ->orderByDesc('created_at')
            ->limit(5)
            ->pluck('search_query')
            ->unique()
            ->values();

        return view('home', compact(
            'stats', 
            'latestReports',
            'topWeeklyReports', 
            'topDailySearches',
            'recentSearches'
        ));
    }

    private function getHomeStats()
    {
        return [
            'total_reports'  => Report::where('status', 'approved')->count(),
            'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
            'total_comments' => DB::table('comments')->count(),
        ];
    }

    private function getLatestReports() {
       return Report::where('status', 'approved')
        ->latest() 
        ->limit(5)
        ->get();
    }
}
