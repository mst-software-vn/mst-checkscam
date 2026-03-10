<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
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
            $type = $this->detectQueryType($query);
            $normalizedQuery = $this->normalizeString($query);

            $dbQuery = Report::where('status', 'approved')
                ->with('comments')
                ->when(in_array($type, ['phone', 'bank']), function ($q) use ($query) {
                    $q->whereRaw("REGEXP_REPLACE(target_id, '[^0-9]', '') = ?", [$query]);
                })
                ->when($type === 'facebook', function ($q) use ($query) {
                    $q->where('target_id', $query)->orWhere('slug', $query);
                })
                ->when($type === 'uuid', function ($q) use ($query) {
                    $q->where('slug', $query);
                })
                ->when($type === 'name', function ($q) use ($normalizedQuery) {
                    $q->whereRaw(
                        "LOWER(TRIM(REGEXP_REPLACE(target_name, '\\\\s+', ' '))) = ?",
                        [$normalizedQuery]
                    );
                })
                ->orderByDesc('created_at');

            // increment search_count with target_id
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
        // thống kê nhanh cho trang search
        // -----------------------------------------------
        $stats = [
            'total_reports' => Report::where('status', 'approved')->count(),
            'total_account' => Report::where('status', 'approved')->where('type', 'account')->count(),
            'total_website' => Report::where('status', 'approved')->where('type', 'website')->count(),
        ];

        return view('reports.index', compact(
            'query',
            'results',
            'isFound',
            'type',
            'recentSearches',
            'stats'
        ));
    }

    /**
     * Trả về danh sách gợi ý tìm kiếm (AJAX)
     */
    public function autoComplete(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (strlen($query) < 3) {
            return response()->json([]);
        }

        $suggestions = Report::where('status', 'approved')
            ->where(function ($q) use ($query) {
                $q->where('target_id', 'LIKE', "{$query}%")
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
    private function detectQueryType(&$query): string
    {
        // 1. Xử lý Facebook URL nâng cao
        if (Str::contains($query, ['facebook.com', 'fb.com'])) {
            if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:facebook|fb)\.com\/(?:profiles\/|profile\.php\?id=)?([^\/?&\s]+)/i', $query, $matches)) {
                $query = $matches[1];
            }
            return 'facebook';
        }

        $clean = preg_replace('/\D/', '', $query);

        // 2. Số điện thoại (VN)
        $phone = $clean;
        if (str_starts_with($phone, '84')) $phone = '0' . substr($phone, 2);
        if (preg_match('/^0(3|5|7|8|9)\d{8}$/', $phone)) {
            $query = $phone;
            return 'phone';
        }

        // 3. Số tài khoản ngân hàng (9-19 số)
        if (preg_match('/^\d{9,19}$/', $clean)) {
            $query = $clean;
            return 'bank';
        }

        return 'name';
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
}
