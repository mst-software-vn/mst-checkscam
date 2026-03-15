<?php

namespace App\Http\Controllers\Admin;

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

        // Filter by time range
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
        ], [
            'title.required' => 'Tiêu đề bài viết không được để trống.',
            'title.max' => 'Tiêu đề bài viết không quá 255 ký tự.',
            'description.required' => 'Mô tả ngắn không được để trống.',
            'description.max' => 'Mô tả ngắn không quá 500 ký tự.',
            'content.required' => 'Nội dung bài viết không được để trống.',
            'content.min' => 'Nội dung bài viết phải có ít nhất 50 ký tự.',
            'thumbnail.required' => 'Thumbnail / Ảnh đại diện là bắt buộc.',
            'thumbnail.image' => 'File tải lên phải là hình ảnh.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Dung lượng ảnh tối đa 5MB.',
        ]);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['title'];
        $globalSlug = generateGlobalUniqueSlug($slugSource);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = uploadImage($request->file('thumbnail'), 'posts');
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $globalSlug,
            'description' => $validated['description'],
            'content' => $validated['content'],
            'is_featured' => $request->boolean('is_featured'),
            'hashtags' => $validated['hashtags'] ?? null,
            'thumbnail' => $thumbnailPath,
            'author_id' => auth()->id(),
        ]);

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

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.create', compact('post'));
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
        ], [
            'title.required' => 'Tiêu đề bài viết không được để trống.',
            'title.max' => 'Tiêu đề bài viết không quá 255 ký tự.',
            'description.required' => 'Mô tả ngắn không được để trống.',
            'description.max' => 'Mô tả ngắn không quá 500 ký tự.',
            'content.required' => 'Nội dung bài viết không được để trống.',
            'content.min' => 'Nội dung bài viết phải có ít nhất 50 ký tự.',
            'thumbnail.image' => 'File tải lên phải là hình ảnh.',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Dung lượng ảnh tối đa 5MB.',
        ]);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['title'];
        $globalSlug = generateGlobalUniqueSlug($slugSource, null, $post->id);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                deleteImage($post->thumbnail);
            }
            $validated['thumbnail'] = uploadImage($request->file('thumbnail'), 'posts');
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $globalSlug,
            'description' => $validated['description'],
            'content' => $validated['content'],
            'is_featured' => $request->boolean('is_featured'),
            'hashtags' => $validated['hashtags'] ?? null,
            'thumbnail' => $validated['thumbnail'] ?? $post->thumbnail,
        ]);

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

    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        if ($post->thumbnail) {
            deleteImage($post->thumbnail);
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
            if ($post->thumbnail) {
                deleteImage($post->thumbnail);
            }
            $post->delete();
        }

        return response()->json(['success' => true, 'message' => 'Đã xóa '.count($posts).' bài viết thành công.']);
    }
}
