<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('target_id', 'like', '%'.$request->search.'%')
                    ->orWhere('target_name', 'like', '%'.$request->search.'%');
            });
        }

        $reports = $query->paginate(15);

        return view('admin.reports.index', compact('reports'));
    }

    public function show(string $id)
    {
        $report = Report::findOrFail($id);

        $reportsCount = Report::where('target_id', $report->target_id)
            ->where('status', 'approved')
            ->count();

        $relatedReports = Report::where('target_id', $report->target_id)
            ->where('id', '!=', $report->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.reports.detail', compact(
            'report',
            'reportsCount',
            'relatedReports',
        ));
    }

    public function approve(string $id)
    {
        $report = Report::findOrFail($id);

        if ($report->status !== 'pending') {
            return back()->with('error', 'Báo cáo này đã được xử lý rồi.');
        }

        $report->update([
            'status' => 'approved',
            'moderator_id' => auth()->id(),
            'rejection_reason' => null,
        ]);

        return back()->with('success', 'Báo cáo đã được duyệt thành công.');
    }

    public function reject(Request $request, string $id)
    {
        $report = Report::findOrFail($id);

        if ($report->status !== 'pending') {
            return back()->with('error', 'Báo cáo này đã được xử lý rồi.');
        }

        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ], [
            'rejection_reason.required' => 'Vui lòng cung cấp lý do từ chối.',
        ]);

        $report->update([
            'status' => 'rejected',
            'moderator_id' => auth()->id(),
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        return back()->with('success', 'Báo cáo đã bị từ chối.');
    }

    public function update(Request $request, string $id)
    {
        $report = Report::findOrFail($id);

        $validated = $request->validate([
            'type' => 'required|in:account,website',
            'target_id' => 'required|string|max:255',
            'target_name' => 'nullable|string|max:255',
            'target_bank' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string|min:50',
            'reporter_name' => 'nullable|string|max:255',
            'reporter_contact' => 'nullable|string|max:255',
            'is_anonymous' => 'nullable|boolean',
            'status' => 'required|in:pending,approved,rejected',
            'rejection_reason' => 'nullable|string',
            'evidence_images' => 'nullable|array',
            'evidence_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'string',
        ]);

        $currentImages = $report->evidence_images ?? [];

        if (! empty($validated['remove_images'])) {
            deleteMultipleImages($validated['remove_images']);
            $currentImages = array_diff($currentImages, $validated['remove_images']);
        }

        if ($request->hasFile('evidence_images')) {
            $newPaths = uploadMultipleImages($request->file('evidence_images'), 'reports');
            $currentImages = array_merge($currentImages, $newPaths);
        }

        $currentImages = array_values($currentImages);

        $report->update([
            'type' => $validated['type'],
            'target_id' => $validated['target_id'],
            'target_name' => $validated['target_name'] ?? null,
            'target_bank' => $validated['target_bank'] ?? null,
            'category' => $validated['category'] ?? null,
            'description' => $validated['description'],
            'reporter_name' => $validated['reporter_name'] ?? 'Người dùng',
            'reporter_contact' => $validated['reporter_contact'] ?? '',
            'is_anonymous' => $request->boolean('is_anonymous'),
            'status' => $validated['status'],
            'rejection_reason' => $validated['status'] === 'rejected' ? $validated['rejection_reason'] : null,
            'evidence_images' => $currentImages,
            'moderator_id' => auth()->id() ?? null,
        ]);

        return back()->with('success', 'Đã cập nhật toàn bộ thông tin báo cáo thành công.');
    }

    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);

        if (! empty($report->evidence_images)) {
            deleteMultipleImages($report->evidence_images);
        }

        $report->delete();

        return redirect()->route('admin.reports.index')
            ->with('success', 'Đã xóa báo cáo khỏi hệ thống.');
    }
}
