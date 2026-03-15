<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = $this->getMetrics();
        $topSearches = $this->getTopSearchesToday();
        $latestReports = $this->getLatestReports();
        $weeklyStats = $this->getWeeklySearchStats();

        return view('admin.dashboard', compact(
            'metrics',
            'topSearches',
            'latestReports',
            'weeklyStats',
        ));
    }

    private function getWeeklySearchStats(): array
    {
        $days = [];
        $foundData = [];
        $notFoundData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $days[] = $date->format('d/m');

            $foundData[] = SearchLog::whereDate('created_at', $date->toDateString())
                ->where('is_found', true)
                ->count();

            $notFoundData[] = SearchLog::whereDate('created_at', $date->toDateString())
                ->where('is_found', false)
                ->count();
        }

        return [
            'labels' => $days,
            'found' => $foundData,
            'not_found' => $notFoundData,
        ];
    }

    private function getMetrics(): array
    {
        return [
            'pending_reports' => Report::where('status', 'pending')->count(),
            'searches_today' => SearchLog::whereDate('created_at', today())->count(),
            'insurance_fund' => Insurance::where('status', 1)->sum('amount'),
            'total_damage' => Report::where('status', 'approved')->sum('damage_amount'),

            'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
            'total_reports' => Report::where('status', 'approved')->count(),
            'total_comments' => Comment::count(),
            'total_posts' => Post::count(),
        ];
    }

    private function getTopSearchesToday()
    {
        return SearchLog::whereDate('created_at', today())
            ->select('search_query', DB::raw('COUNT(*) as count'))
            ->groupBy('search_query')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
    }

    private function getLatestReports()
    {
        return Report::latest()
            ->limit(10)
            ->get();
    }
}
