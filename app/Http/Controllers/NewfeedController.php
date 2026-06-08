<?php

namespace App\Http\Controllers;

use App\Models\NewfeedPost;
use App\Models\NewfeedPostReport;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewfeedController extends Controller
{
    public function show(NewfeedPost $post)
    {
        if ($post->is_hidden && ! (Auth::check() && Auth::user()->isAdmin())) {
            abort(404);
        }

        $post->load('user');

        $imageUrls = [];
        if (! empty($post->image_paths)) {
            $imageUrls = array_map(fn ($p) => asset('storage/'.$p), $post->image_paths);
        } elseif ($post->image_path) {
            $imageUrls = [asset('storage/'.$post->image_path)];
        }

        $userReportedIds = [];
        if (Auth::check()) {
            $userReportedIds = NewfeedPostReport::where('reporter_id', Auth::id())
                ->where('post_id', $post->id)
                ->pluck('post_id')
                ->toArray();
        }

        return view('newfeed.show', compact('post', 'imageUrls', 'userReportedIds'));
    }

    public function index(Request $request)
    {
        SEOTools::setTitle('Khu Mua Bán');
        SEOTools::setDescription('Mua bán tài khoản, dịch vụ MMO uy tín. Cộng đồng MMO Việt Nam.');
        $categories = config('newfeed.categories', []);

        $query = NewfeedPost::with('user')->visible()->latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('q')) {
            $query->where('content', 'like', '%'.$request->q.'%');
        }

        $posts = $query->paginate(12);

        $categoryCounts = NewfeedPost::visible()
            ->selectRaw('category, count(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        $userReportedIds = [];
        if (Auth::check()) {
            $userReportedIds = NewfeedPostReport::where('reporter_id', Auth::id())
                ->pluck('post_id')
                ->toArray();
        }

        return view('newfeed.index', compact('posts', 'categories', 'categoryCounts', 'userReportedIds'));
    }
}
