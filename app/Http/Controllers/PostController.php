<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('author')->orderBy('id', 'desc');

        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('hashtags', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(9);

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
