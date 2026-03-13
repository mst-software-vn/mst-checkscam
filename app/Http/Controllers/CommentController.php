<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function store(Request $request, int $reportId)
    {
        $report = Report::where('id', $reportId)
            ->where('status', 'approved')
            ->firstOrFail();

        $ip = $request->ip();
        $cacheKey = getCommentRateLimitKey($ip);

        $commentCount = Cache::get($cacheKey, 0);
        if ($commentCount >= 5) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => ['general' => ['Bạn đã comment quá 5 lần hôm nay. Vui lòng thử lại vào ngày mai!']]
                ], 422);
            }

            return back()->with('error', 'Bạn đã comment quá 5 lần hôm nay.');
        }

        $isAnonymous = $request->boolean('is_anonymous');

        $validated = $request->validate([
            'full_name' => $isAnonymous ? 'nullable|string|max:100' : 'required|string|max:100',
            'content'   => 'required|string|min:10|max:1000',
        ], [
            'full_name.required' => 'Vui lòng nhập tên hiển thị hoặc chọn ẩn danh.',
            'content.required'   => 'Nội dung bình luận không được để trống.',
            'content.min'        => 'Bình luận cần ít nhất 10 ký tự.',
            'content.max'        => 'Bình luận không được vượt quá 1000 ký tự.',
        ]);

        $comment = Comment::create([
            'report_id'    => $report->id,
            'full_name' => $isAnonymous ? 'Ẩn danh - ' . $ip : $validated['full_name'],
            'content'      => $validated['content'],
            'ip_address'   => $ip,
            'is_anonymous' => $isAnonymous,
        ]);

        $secondsUntilMidnight = now()->secondsUntilEndOfDay();
        Cache::put($cacheKey, $commentCount + 1, $secondsUntilMidnight);

        if ($request->ajax()) {
            return response()->json([
                'message'    => 'Bình luận đã được đăng thành công!',
                'comment' => [
                    'id'           => $comment->id,
                    'display_name' => $comment->display_name,
                    'content'      => $comment->content,
                    'created_at'   => $comment->created_at->diffForHumans(),
                    'is_anon'      => $comment->is_anonymous,
                    'initials'     => $this->getInitials($comment->full_name),
                    'can_modify'   => true,
                ],
            ]);
        }

        return back()->with('success', 'Bình luận đã được đăng thành công!');
    }

    public function update(Request $request, int $id)
    {
        $comment = Comment::findOrFail($id);

        if (!$comment->canModify($request->ip())) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => ['general' => ['Bình luận đã quá thời gian cho phép chỉnh sửa (15 phút).']]
                ], 403);
            }
            return back()->with('error', 'Không thể chỉnh sửa bình luận sau 15 phút.');
        }

        $validated = $request->validate([
            'content' => 'required|string|min:10|max:1000',
        ], [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'content.min'      => 'Bình luận cần ít nhất 10 ký tự.',
            'content.max'      => 'Bình luận không được vượt quá 1000 ký tự.',
        ]);

        $comment->update(['content' => $validated['content']]);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Bình luận đã được cập nhật!',
                'content' => $comment->content,
            ]);
        }

        return back()->with('success', 'Bình luận đã được cập nhật!');
    }

    public function destroy(Request $request, int $id)
    {
        $comment = Comment::findOrFail($id);

        if (!$comment->canModify($request->ip())) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => ['general' => ['Bình luận đã quá thời gian cho phép xoá (15 phút).']]
                ], 403);
            }
            return back()->with('error', 'Không thể xoá bình luận sau 15 phút.');
        }

        $comment->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Bình luận đã được xoá!']);
        }

        return back()->with('success', 'Bình luận đã được xoá!');
    }

    private function getInitials(?string $name): string
    {
        if (!$name) return 'AN';
        $words = explode(' ', trim($name));
        $init  = mb_strtoupper(mb_substr($words[0], 0, 1));
        if (count($words) > 1) $init .= mb_strtoupper(mb_substr(end($words), 0, 1));
        return $init;
    }
}
