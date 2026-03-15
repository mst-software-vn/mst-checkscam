<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comment::with('report')->latest();

        if ($request->filled('report_id')) {
            $query->where(fn ($q) => $q->where('report_id', $request->integer('report_id')));
        }

        if ($request->filled('keyword')) {
            $keyword = $request->string('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('full_name', 'LIKE', "%{$keyword}%")
                    ->orWhere('content', 'LIKE', "%{$keyword}%");
            });
        }

        if ($request->filled('is_anonymous')) {
            $query->where(fn ($q) => $q->where('is_anonymous', $request->boolean('is_anonymous')));
        }

        // Filter by time range
        if ($request->filled('time_range')) {
            switch ($request->time_range) {
                case 'today':
                    $query->whereDate('created_at', now()->today());
                    break;
                case '3_days':
                    $query->where(fn ($q) => $q->where('created_at', '>=', now()->subDays(3)));
                    break;
                case '7_days':
                    $query->where(fn ($q) => $q->where('created_at', '>=', now()->subDays(7)));
                    break;
                case '1_month':
                    $query->where(fn ($q) => $q->where('created_at', '>=', now()->subMonth()));
                    break;
            }
        }

        $comments = $query->paginate(20)->withQueryString();

        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(int $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['success' => true, 'message' => 'Đã xoá bình luận thành công!']);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        $comments = Comment::whereIn('id', $ids)->get();

        foreach ($comments as $comment) {
            $comment->delete();
        }

        return response()->json(['success' => true, 'message' => 'Đã xóa '.count($comments).' bình luận thành công.']);
    }
}
