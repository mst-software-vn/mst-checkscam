<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'name')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'site_title',
            'site_description',
            'seo_keywords',
            'hotline',
            'support_email',
            'zalo_link',
            'facebook_link',
            'telegram_link',
            'enable_insurance',
            'enable_comments',
            'maintenance_mode',
            'header_scripts',
        ];

        foreach ($keys as $key) {
            $value = $request->input($key);

            if (in_array($key, ['enable_insurance', 'enable_comments', 'maintenance_mode'])) {
                $value = $request->has($key) ? '1' : '0';
            }

            if ($value !== null) {
                Setting::setValue($key, $value);
            }
        }

        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $path = FileHelper::uploadImage($request->file('logo'), 'settings');
            Setting::setValue('logo', $path);
        }

        if ($request->hasFile('favicon')) {
            $request->validate(['favicon' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:1024']);
            $path = FileHelper::uploadImage($request->file('favicon'), 'settings');
            Setting::setValue('favicon', $path);
        }

        if ($request->hasFile('og_image')) {
            $request->validate(['og_image' => 'image|mimes:jpeg,png,jpg|max:2048']);
            $path = FileHelper::uploadImage($request->file('og_image'), 'settings');
            Setting::setValue('og_image', $path);
        }

        return back()->with('success', 'Đã lưu cài đặt thành công.');
    }
}
