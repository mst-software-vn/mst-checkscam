<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewfeedPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminNewfeedController extends Controller
{
    public function hidden(Request $request)
    {
        $posts = NewfeedPost::with('user')
            ->where('is_hidden', 1)
            ->latest()
            ->paginate(20);

        return view('admin.newfeed.hidden', compact('posts'));
    }

    public function unhide(NewfeedPost $post): RedirectResponse
    {
        $post->update(['is_hidden' => 0]);

        return redirect()->route('admin.newfeed.hidden')
            ->with('success', 'Đã bỏ ẩn bài đăng.');
    }
}
