<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // For now, no pagination needed or maybe 12 per page
        $posts = Post::with('author')->orderBy('id', 'desc')->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::query()->with('author')->where('slug', $slug)->firstOrFail();
        $post->incrementViewCount();

        $relatedPosts = Post::query()->where('id', '!=', $post->id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $popularPosts = Post::query()->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();

        return view('posts.detail', compact('post', 'relatedPosts', 'popularPosts'));
    }
}
