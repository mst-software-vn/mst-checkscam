<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        SEOTools::setTitle('Cẩm nang MMO - Tra cứu lừa đảo');
        SEOTools::setDescription('Tổng hợp kiến thức, cẩm nang phòng tránh lừa đảo trực tuyến và kinh nghiệm MMO.');

        $query = Post::with('author')->orderBy('id', 'desc');
        // ... rest of index ...
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

        // SEO
        SEOTools::setTitle($post->title);
        SEOTools::setDescription($post->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->addImage($post->thumbnail_url);

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
