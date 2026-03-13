<?php

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Support\Facades\DB;

if (! function_exists('getTopWeeklyReports')) {
    function getTopWeeklyReports()
    {
        return Report::where('status', 'approved')
            ->where('created_at', '>=', now()->subDays(7))
            ->select(
                'target_id',
                DB::raw('MAX(target_name) as target_name'),
                DB::raw('MAX(type) as type'),
                DB::raw('SUM(view_count) as view_count'),
                DB::raw('COUNT(*) as report_count'),
            )
            ->groupBy('target_id')
            ->orderByDesc('report_count')
            ->limit(7)
            ->get();
    }
}

if (! function_exists('getTopDailySearches')) {
    function getTopDailySearches()
    {
        $topSearches = SearchLog::whereDate('created_at', today())
            ->select('search_query', DB::raw('COUNT(*) as count'))
            ->groupBy('search_query')
            ->orderByDesc('count')
            ->limit(3)
            ->get();

        if ($topSearches->isEmpty()) {
            return collect();
        }

        $reports = Report::whereIn('target_id', $topSearches->pluck('search_query'))
            ->where('status', 'approved')
            ->get()
            ->keyBy('target_id');

        return $topSearches->map(function ($search) use ($reports) {
            $scamInfo = $reports->get($search->search_query);

            return (object) [
                'is_scam' => (bool) $scamInfo,
                'target_id' => $search->search_query,
                'target_name' => $scamInfo->target_name ?? 'Chưa rõ thông tin',
                'type' => $scamInfo->type ?? 'Từ khóa hệ thống',
                'search_count' => $search->count,
                'view_count' => $search->count,
                'slug' => $scamInfo->slug ?? '#',
            ];
        });
    }
}
