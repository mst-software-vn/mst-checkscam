<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $ip = $request->ip();

        $recentReportsCount = Report::where('ip_address', $ip)
            ->where('created_at', '>=', now()->subDay())
            ->count();

        if ($recentReportsCount >= 3) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => ['general' => ['Bạn đã gửi quá nhiều lần hôm nay. Vui lòng thử lại vào ngày mai!']]
                ], 422);
            }
            return back()->withInput()->with('error', 'Bạn đã gửi quá nhiều lần hôm nay.');
        }

        $validated = $request->validate([
            'type'             => 'required|in:account,website',
            'target_id'        => 'required|string|max:255',
            'target_name'      => 'nullable|string|max:255',
            'target_bank'      => 'nullable|string|max:255',
            'category'         => 'nullable|string|max:255',
            'description'      => 'required|string|min:50',
            'reporter_name'    => 'nullable|string|max:255',
            'reporter_contact' => 'nullable|string|max:255',
            'is_anonymous'     => 'nullable|boolean',
            'evidence_images'  => 'required|array|min:1',
            'evidence_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'description.min'           => 'Vui lòng mô tả hành vi lừa đảo với ít nhất 50 ký tự.',
            'evidence_images.required'  => 'Bắt buộc phải tải lên ít nhất 1 ảnh bằng chứng.',
            'evidence_images.min'       => 'Bắt buộc phải tải lên ít nhất 1 ảnh bằng chứng.',
            'evidence_images.*.image'   => 'File tải lên phải là hình ảnh.',
            'evidence_images.*.max'     => 'Mỗi hình ảnh không được vượt quá 5MB.',
        ]);

        $evidencePaths = [];
        if ($request->hasFile('evidence_images')) {
            $evidencePaths = uploadMultipleImages($request->file('evidence_images'), 'reports');
        }

        $slug        = Str::slug(($validated['target_name'] ?? 'scammer') . '-' . Str::random(8));
        $isAnonymous = $request->boolean('is_anonymous');

        Report::create([
            'type'             => $validated['type'],
            'reporter_name'    => $validated['reporter_name'] ?? 'Người dùng',
            'reporter_contact' => $validated['reporter_contact'] ?? '',
            'is_anonymous'     => $isAnonymous,
            'target_id'        => $validated['target_id'],
            'target_name'      => $validated['target_name'] ?? null,
            'target_bank'      => $validated['target_bank'] ?? null,
            'category'         => $validated['category'] ?? null,
            'description'      => $validated['description'],
            'evidence_images'  => $evidencePaths,
            'status'           => 'pending',
            'ip_address'       => $ip,
            'slug'             => $slug,
        ]);

        // ← Trả JSON redirect cho AJAX, redirect thường cho non-AJAX
        if ($request->ajax()) {
            return response()->json(['redirect' => route('home')]);
        }

        return redirect()->route('home')
            ->with('success', 'Báo cáo đã được gửi và đang chờ kiểm duyệt.');
    }

    public function show(string $slug)
    {
        $report = Report::where('slug', $slug)
            ->where('status', 'approved')
            ->firstOrFail();

        $cacheKey = 'view_' . $report->id . '_' . request()->ip();
        if (!Cache::has($cacheKey)) {
            $report->incrementViewCount();
            Cache::put($cacheKey, true, now()->addHours(24));
        }

        $displayReporterName = $report->is_anonymous ? 'Người dùng ẩn danh' : $report->reporter_name;

        $reportsCount = Report::where('target_id', $report->target_id)
            ->where('status', 'approved')
            ->count();

        $totalSearchCount = Report::where('target_id', $report->target_id)
            ->where('status', 'approved')
            ->sum('search_count');

        $relatedReports = Report::where('status', 'approved')
            ->where('id', '!=', $report->id)
            ->where(function ($q) use ($report) {
                if (!empty($report->target_bank)) {
                    $q->where('target_bank', $report->target_bank);
                }

                $q->orWhere('type', $report->type);
            })
            ->latest()
            ->limit(4)
            ->get();

        $latestReports = Report::where('status', 'approved')
            ->where('id', '!=', $report->id)
            ->latest()
            ->limit(3)
            ->get();

        $stats = [
            'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
            'total_comments' => DB::table('comments')->count(),
        ];

        return view('scammer.index', compact(
            'report',
            'displayReporterName',
            'reportsCount',
            'totalSearchCount',
            'relatedReports',
            'latestReports',
            'stats'
        ));
    }
}
