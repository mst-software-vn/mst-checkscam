<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Search theo query 
     * 
     * @param Request $request
     * */
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));
        $results = collect();
        $isFound = false;
        $type    = null;

        if ($query !== '') {
            [$type, $formattedQuery] = $this->detectQueryType($query);
            $normalizedQuery = $this->normalizeString($formattedQuery);

            $dbQuery = Report::where('status', 'approved')
                ->with('comments')
                ->when(in_array($type, ['phone', 'bank']), function ($q) use ($formattedQuery) {
                    $q->whereRaw("REGEXP_REPLACE(target_id, '[^0-9]', '') = ?", [$formattedQuery]);
                })
                ->when($type === 'facebook', function ($q) use ($formattedQuery) {
                    $q->where(function ($sub) use ($formattedQuery) {
                        $sub->where('target_id', $formattedQuery)
                            ->orWhere('slug', $formattedQuery)
                            ->orWhere('target_id', 'LIKE', "%facebook.com/{$formattedQuery}")
                            ->orWhere('target_id', 'LIKE', "%fb.com/{$formattedQuery}");
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

        // Hiển thị các báo cáo phổ biến (bất kể có kết quả tìm kiếm hay không)
        $topWeeklyReports = $this->getTopWeeklyReports();
        $topDailySearches = $this->getTopDailySearches();

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

    /**
     * Trả về danh sách gợi ý tìm kiếm (AJAX)
     */
    public function autoComplete(Request $request)
    {
        $query = trim((string) $request->get('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        [$type, $formattedQuery] = $this->detectQueryType($query);

        $suggestions = Report::where('status', 'approved')
            ->where(function ($q) use ($query, $formattedQuery) {
                $q->where('target_id', 'LIKE', "%{$formattedQuery}%")
                    ->orWhere('target_name', 'LIKE', "%{$query}%");
            })
            ->select('target_id', 'target_name', 'type', 'slug')
            ->limit(8)
            ->get()
            ->map(fn($r) => [
                'label'       => $r->target_id . ($r->target_name ? " — {$r->target_name}" : ''),
                'value'       => $r->target_id,
                'type'        => $r->type,
                'target_name' => $r->target_name,
                'slug'        => $r->slug,
            ]);

        return response()->json($suggestions);
    }

    /**
     * Xóa lịch sử tìm kiếm của IP hiện tại
     */
    public function clearHistory(Request $request)
    {
        SearchLog::where('ip_address', $request->ip())->delete();

        return back()->with('success', 'Đã xóa lịch sử tìm kiếm.');
    }

    /**
     * Detect loại query người dùng nhập vào:
     * - uuid:
     * - phone:
     * - bank: 
     * - name: 
     */
    private function detectQueryType(string $query): array
    {
        $formattedQuery = $query;
        
        // 0. Xử lý UUID
        if (Str::isUuid($formattedQuery)) {
            return ['uuid', $formattedQuery];
        }

        // 1. Xử lý Facebook URL nâng cao
        if (Str::contains($formattedQuery, ['facebook.com', 'fb.com'])) {
            if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:facebook|fb)\.com\/(?:profiles\/|profile\.php\?id=)?([^\/?&\s]+)/i', $formattedQuery, $matches)) {
                $formattedQuery = $matches[1];
            }
            return ['facebook', $formattedQuery];
        }

        // 2 & 3. Số điện thoại / STK (Kiểm tra xem chuỗi có cấu trúc giống số không)
        $isNumeric = preg_match('/^[\s\+\-\.()]*\d[\d\s\+\-\.()]*$/', $formattedQuery);
        
        if ($isNumeric) {
            $numericRaw = preg_replace('/[^\d+]/', '', $formattedQuery);
            
            // Fix +84 or 84 prefix for Vietnamese phones
            if (str_starts_with($numericRaw, '+84')) {
                $numericRaw = '0' . substr($numericRaw, 3);
            } elseif (preg_match('/^84(3|5|7|8|9)/', $numericRaw)) {
                $numericRaw = '0' . substr($numericRaw, 2);
            }

            $numericClean = preg_replace('/\D/', '', $numericRaw);

            // Cập nhật lại list type detection
            if (preg_match('/^0\d{8,11}$/', $numericClean)) {
                return ['phone', $numericClean];
            }

            if (preg_match('/^\d{5,19}$/', $numericClean)) {
                return ['bank', $numericClean];
            }

            // Fallback cho autoComplete khi đang gõ dở 1 chuỗi số
            return ['name', $numericClean];
        }

        return ['name', $formattedQuery];
    }

    /**
     * Normalize chuỗi họ tên để so sánh exact:
     * - Lowercase
     * - Bỏ khoảng trắng thừa ở đầu/cuối
     * - Nhiều khoảng trắng giữa → 1 khoảng trắng
     */
    private function normalizeString(string $str): string
    {
        $str = mb_strtolower(trim($str), 'UTF-8');
        $str = preg_replace('/\s+/', ' ', $str);

        return $str;
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
