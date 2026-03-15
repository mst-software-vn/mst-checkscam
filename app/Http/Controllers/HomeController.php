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

        $page = $request->input('page', 1);
        if ($page == 1) {
            $perPage = 8;
            $offset = 0;
        } else {
            $perPage = 16;
            $offset = 8 + ($page - 2) * 16;
        }

        $query = \App\Models\Comment::whereHas('report', function ($query) {
            $query->where('status', 'approved');
        })->with('report')->latest();

        $totalCount = $query->count();
        $items = $query->skip($offset)->take($perPage)->get();

        $comments = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $totalCount,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()],
        );

        if ($request->ajax()) {
            return view('partials.comment-items', compact('comments'))->render();
        }

        return view('home', compact(
            'stats',
            'latestReports',
            'topWeeklyReports',
            'topDailySearches',
            'recentSearches',
            'comments',
        ));
    }

    private function getHomeStats()
    {
        return [
            'total_reports' => Report::where('status', 'approved')->count(),
            'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
            'total_comments' => DB::table('comments')->count(),
        ];
    }

    private function getLatestReports()
    {
        return Report::where('status', 'approved')
            ->withCount('comments')
            ->latest()
            ->limit(5)
            ->get();
    }
}
