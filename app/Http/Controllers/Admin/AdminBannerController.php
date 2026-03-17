<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query()->ordered();

        if ($request->filled('position')) {
            $query->forPosition($request->position);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $banners = $query->paginate(15);

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'redirect_url' => 'nullable|url|max:500',
            'position' => 'required|in:home_top,home_sidebar,home_between,scammer,blog',
            'type' => 'required|in:horizontal,square',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $banner = Banner::create([
            'title' => $request->title,
            'redirect_url' => $request->redirect_url,
            'position' => $request->position,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->has('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $banner->addMediaFromRequest('image')->toMediaCollection('banner');
            // Legacy support
            $banner->update(['image_path' => $banner->getFirstMedia('banner')->file_name]);
        }

        return redirect()->route('admin.banners.index')->with('success', 'Đã tạo banner thành công.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'redirect_url' => 'nullable|url|max:500',
            'position' => 'required|in:home_top,home_sidebar,home_between,scammer,blog',
            'type' => 'required|in:horizontal,square',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $banner->update([
            'title' => $request->title,
            'redirect_url' => $request->redirect_url,
            'position' => $request->position,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->has('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $banner->addMediaFromRequest('image')->toMediaCollection('banner');
            // Legacy support
            $banner->update(['image_path' => $banner->getFirstMedia('banner')->file_name]);
        }

        return redirect()->route('admin.banners.index')->with('success', 'Đã cập nhật banner thành công.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->clearMediaCollection('banner');
        $banner->delete();

        return back()->with('success', 'Đã xóa banner.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        $banners = Banner::whereIn('id', $ids)->get();
        foreach ($banners as $banner) {
            $banner->clearMediaCollection('banner');
            $banner->delete();
        }

        return back()->with('success', 'Đã xóa '.count($ids).' banner.');
    }

    public function toggleStatus($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->update(['status' => ! $banner->status]);

        return back()->with('success', 'Đã cập nhật trạng thái banner.');
    }
}
