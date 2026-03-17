<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigHelper;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $featuredPost = null;
        if ($posts->currentPage() == 1 && ! $request->filled('search')) {
            $featuredPost = Post::query()
                ->where('is_featured', true)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($featuredPost) {
                // Re-fetch regular posts excluding the featured one
                $posts = Post::query()
                    ->with('author')
                    ->where('id', '!=', $featuredPost->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
            }
        }

        return view('posts.index', compact('posts', 'featuredPost'));
    }

    public function show($slug)
    {
        $post = Post::query()->with('author')->where('slug', $slug)->firstOrFail();
        $post->incrementViewCount();

        // SEO
        $siteTitle = ConfigHelper::getConfig('site_title', 'CheckScam');
        $metaTitle = $post->title.' | '.$siteTitle;
        $metaDesc = $post->description ?? Str::limit(strip_tags($post->content), 160);

        SEOTools::setTitle($metaTitle);
        SEOTools::setDescription($metaDesc);
        SEOTools::metatags()->addKeyword($post->hashtags.', cẩm nang mmo, kiến thức lừa đảo, check scam');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->setTitle($metaTitle);
        SEOTools::opengraph()->setDescription($metaDesc);
        SEOTools::opengraph()->addImage($post->thumbnail_url);

        // Structured Data for Blog Post
        SEOTools::jsonLd()->setTitle($metaTitle);
        SEOTools::jsonLd()->setDescription($metaDesc);
        SEOTools::jsonLd()->setType('BlogPosting');
        SEOTools::jsonLd()->addImage($post->thumbnail_url);
        SEOTools::jsonLd()->addValue('datePublished', $post->created_at->toIso8601String());
        SEOTools::jsonLd()->addValue('dateModified', $post->updated_at->toIso8601String());
        SEOTools::jsonLd()->addValue('author', [
            '@type' => 'Person',
            'name' => $post->author->name ?? 'Admin',
        ]);
        SEOTools::jsonLd()->addValue('headline', $post->title);

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
