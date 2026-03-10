<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $stats = $this->getHomeStats();
        $latestReports = $this->getLatestReports();
        $topWeeklyReports = $this->getTopWeeklyReports();
        $topDailySearches = $this->getTopDailySearches();

        return view('home', compact(
            'stats', 
            'latestReports',
            'topWeeklyReports', 
            'topDailySearches'
        ));
    }

    private function getHomeStats()
    {
        return Cache::remember('home_stats', 3600, function () {
            return [
                'total_reports' => Report::where('status', 'approved')->count(),
                'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
                'total_comments' => DB::table('comments')->count(),
            ];
        });
    }

    private function getLatestReports() {
       return Report::where('status', 'approved')
        ->latest() 
        ->limit(10)
        ->get();
    }

   private function getTopWeeklyReports()
    {
        return Report::where('status', 'approved')
            ->where('created_at', '>=', now()->subDays(7))
            ->select('target_id', 
                DB::raw('MAX(target_name) as target_name'),
                DB::raw('MAX(type) as type'), 
                DB::raw('SUM(view_count) as total_views'),
                DB::raw('COUNT(*) as report_count')
            )
            ->groupBy('target_id')
            ->orderByDesc('report_count')
            ->limit(7)
            ->get();
    }
    
    private function getTopDailySearches()
    {
        $topSearches = SearchLog::whereDate('created_at', today())
            ->select('search_query', DB::raw('COUNT(*) as count'))
            ->groupBy('search_query')
            ->orderByDesc('count')
            ->limit(3)
            ->get();

        if ($topSearches->isEmpty()) return collect();

        $reports = Report::whereIn('target_id', $topSearches->pluck('search_query'))
            ->where('status', 'approved')
            ->get()
            ->keyBy('target_id');

        return $topSearches->map(function ($search) use ($reports) {
            $scamInfo = $reports->get($search->search_query);

            return (object)[
                'is_scam' => (bool)$scamInfo,
                'target_id' => $search->search_query,
                'target_name' => $scamInfo->target_name ?? 'Chưa rõ thông tin',
                'type' => $scamInfo->type ?? 'Từ khóa hệ thống',
                'search_count' => $search->count,
                'slug' => $scamInfo->slug ?? '#',
            ];
        });
    }
}
