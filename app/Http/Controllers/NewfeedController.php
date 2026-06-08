<?php

namespace App\Http\Controllers;

use App\Models\NewfeedPost;
use App\Models\NewfeedPostReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewfeedController extends Controller
{
    public function index(Request $request)
    {
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
