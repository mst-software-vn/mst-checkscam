<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()->with('author')->latest();

        if ($request->filled('is_featured')) {
            $query->where(fn ($q) => $q->where('is_featured', $request->boolean('is_featured')));
        }

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
                    $query->where(fn ($q) => $q->where('created_at', '>=', now()->subMonths(1)));
                    break;
            }
        }

        if ($request->filled('search')) {
            $query->where(fn ($q) => $q->where('title', 'like', '%'.$request->search.'%'));
        }

        $posts = $query->paginate(15)->withQueryString();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'description' => 'required|string|max:500',
            'content' => 'required|string|min:50',
            'is_featured' => 'nullable|boolean',
            'hashtags' => 'nullable|string|max:500',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['title'];
        $globalSlug = StringHelper::generateGlobalUniqueSlug($slugSource);

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $globalSlug,
            'description' => $validated['description'],
            'content' => $validated['content'],
            'is_featured' => $request->boolean('is_featured'),
            'hashtags' => $validated['hashtags'] ?? null,
            'author_id' => auth()->id(),
        ]);

        if ($request->hasFile('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');

            // Legacy support
            $post->update(['thumbnail' => $post->getFirstMedia('thumbnail')->file_name]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã tạo bài viết thành công.',
                'redirect' => route('admin.posts.index'),
            ]);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Đã tạo bài viết thành công.');
    }

    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string|min:50',
            'is_featured' => 'nullable|boolean',
            'hashtags' => 'nullable|string|max:500',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['title'];
        $globalSlug = StringHelper::generateGlobalUniqueSlug($slugSource, null, $post->id);

        $post->update([
            'title' => $validated['title'],
            'slug' => $globalSlug,
            'description' => $validated['description'],
            'content' => $validated['content'],
            'is_featured' => $request->boolean('is_featured'),
            'hashtags' => $validated['hashtags'] ?? null,
        ]);

        if ($request->hasFile('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
            // Legacy support
            $post->update(['thumbnail' => $post->getFirstMedia('thumbnail')->file_name]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật bài viết thành công.',
                'redirect' => route('admin.posts.index'),
            ]);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Đã cập nhật bài viết thành công.');
    }

    // ... destroy methods ...
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        // Delete media library thumbnail if exists
        $post->clearMediaCollection('thumbnail');

        if ($post->thumbnail) {
            FileHelper::deleteImage($post->thumbnail);
        }

        $post->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa bài viết thành công.',
            ]);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Đã xóa bài viết.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Không có bài viết nào được chọn.']);
        }
        $posts = Post::whereIn('id', $ids)->get();
        foreach ($posts as $post) {
            $post->clearMediaCollection('thumbnail');
            if ($post->thumbnail) {
                FileHelper::deleteImage($post->thumbnail);
            }
            $post->delete();
        }

        return response()->json(['success' => true, 'message' => 'Đã xóa '.count($posts).' bài viết thành công.']);
    }
}
