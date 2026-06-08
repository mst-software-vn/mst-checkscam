<?php

namespace App\Http\Controllers;

use App\Mail\PostHiddenMail;
use App\Models\NewfeedPost;
use App\Models\NewfeedPostReport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewfeedPostReportController extends Controller
{
    public function store(Request $request, NewfeedPost $post): JsonResponse
    {
        if (! Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        if ($post->user_id === Auth::id()) {
            return response()->json(['error' => 'Không thể report bài của chính mình'], 403);
        }

        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $alreadyReported = NewfeedPostReport::where('post_id', $post->id)
            ->where('reporter_id', Auth::id())
            ->exists();

        if ($alreadyReported) {
            return response()->json(['error' => 'Bạn đã report bài này rồi'], 422);
        }

        NewfeedPostReport::create([
            'post_id' => $post->id,
            'reporter_id' => Auth::id(),
            'reason' => $request->reason,
            'created_at' => now(),
        ]);

        $post->increment('report_count');
        $post->refresh();

        $threshold = (int) env('POST_REPORT_THRESHOLD', 10);

        if ($post->report_count >= $threshold && ! $post->is_hidden) {
            $post->update(['is_hidden' => 1]);

            if ($post->user && $post->user->email) {
                Mail::to($post->user->email)->queue(new PostHiddenMail($post));
            }
        }

        return response()->json([
            'success' => true,
            'report_count' => $post->report_count,
        ]);
    }
}
