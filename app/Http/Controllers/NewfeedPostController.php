<?php

namespace App\Http\Controllers;

use App\Models\NewfeedPost;
use App\Models\NewfeedPostReport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewfeedPostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = NewfeedPost::with('user');

        if (! (Auth::check() && Auth::user()->isAdmin())) {
            $query->visible();
        }

        if ($request->filled('category')) {
            $cats = explode(',', $request->category);
            $query->whereIn('category', $cats);
        }

        if ($request->filled('q')) {
            $query->where('content', 'like', '%'.$request->q.'%');
        }

        $sort = $request->input('sort', 'newest');
        $query->orderBy('created_at', $sort === 'oldest' ? 'asc' : 'desc');

        $perPage = (int) $request->input('per_page', 12);
        $posts = $query->paginate($perPage);

        $authId = Auth::id();

        $reportedIds = [];
        if ($authId) {
            $reportedIds = NewfeedPostReport::where('reporter_id', $authId)
                ->whereIn('post_id', $posts->pluck('id'))
                ->pluck('post_id')
                ->toArray();
        }

        $items = $posts->getCollection()->map(function (NewfeedPost $post) use ($authId, $reportedIds) {
            return $this->formatPost($post, $authId, $reportedIds);
        });

        return response()->json([
            'data' => $items,
            'current_page' => $posts->currentPage(),
            'last_page' => $posts->lastPage(),
            'has_more' => $posts->hasMorePages(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if (! Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $validated = $request->validate([
            'content' => 'required|string|min:10|max:5000',
            'price' => 'nullable|numeric|min:0|max:999999999',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = NewfeedPost::create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'price' => $validated['price'] ?? null,
            'category' => $validated['category'],
            'image_path' => $imagePath,
        ]);

        $post->load('user');

        return response()->json([
            'post' => $this->formatPost($post, Auth::id(), []),
        ], 201);
    }

    public function destroy(NewfeedPost $post): JsonResponse
    {
        if (! Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        if (Auth::user()->cannot('delete', $post)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return response()->json(['success' => true]);
    }

    private function formatPost(NewfeedPost $post, ?int $authId, array $reportedIds): array
    {
        return [
            'id' => $post->id,
            'content' => $post->content,
            'price' => $post->price,
            'category' => $post->category,
            'image_url' => $post->image_path ? asset('storage/'.$post->image_path) : null,
            'report_count' => $post->report_count,
            'is_hidden' => $post->is_hidden,
            'created_at' => $post->created_at->diffForHumans(),
            'is_mine' => $authId && $authId === $post->user_id,
            'is_reported' => in_array($post->id, $reportedIds),
            'user' => [
                'id' => $post->user->id,
                'name' => $post->user->full_name ?? $post->user->username,
                'avatar_url' => $post->user->avatar_url,
                'is_verified' => (bool) $post->user->is_verified,
            ],
        ];
    }
}
