<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigHelper;
use App\Helpers\StringHelper;
use App\Models\Report;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $ip = $request->ip();

        $recentReportsCount = Report::where('ip_address', $ip)
            ->where('created_at', '>=', now()->subDay())
            ->count();

        if ($recentReportsCount >= 3) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => ['general' => ['Bạn đã gửi quá nhiều lần hôm nay. Vui lòng thử lại vào ngày mai!']],
                ], 422);
            }

            return back()->withInput()->with('error', 'Bạn đã gửi quá nhiều lần hôm nay.');
        }

        $validated = $request->validate([
            'type' => 'required|in:account,website',
            'target_id' => 'required|string|max:255',
            'target_name' => 'nullable|string|max:255',
            'target_bank' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'damage_amount' => 'nullable|numeric|min:0',
            'description' => 'required|string|min:50',
            'reporter_name' => 'nullable|string|max:255',
            'reporter_contact' => 'nullable|string|max:255',

            'evidence_images' => 'required|array|min:1',
            'evidence_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'damage_amount.numeric' => 'Số tiền thiệt hại phải là chữ số.',
            'damage_amount.min' => 'Số tiền không được nhỏ hơn 0.',
            'description.min' => 'Vui lòng mô tả hành vi lừa đảo với ít nhất 50 ký tự.',
            'evidence_images.required' => 'Bắt buộc phải tải lên ít nhất 1 ảnh bằng chứng.',
            'evidence_images.min' => 'Bắt buộc phải tải lên ít nhất 1 ảnh bằng chứng.',
            'evidence_images.*.image' => 'File tải lên phải là hình ảnh.',
            'evidence_images.*.max' => 'Mỗi hình ảnh không được vượt quá 5MB.',
        ]);

        $slug = Str::slug(($validated['target_name'] ?? 'scammer').'-'.Str::random(8));

        $report = Report::create([
            'type' => $validated['type'],
            'reporter_name' => $validated['reporter_name'] ?? 'Người dùng',
            'reporter_contact' => $validated['reporter_contact'] ?? '',

            'target_id' => $validated['target_id'],
            'target_name' => $validated['target_name'] ?? null,
            'target_bank' => $validated['target_bank'] ?? null,
            'category' => $validated['category'] ?? null,
            'damage_amount' => $validated['damage_amount'] ?? null,
            'description' => $validated['description'],
            'status' => 'pending',
            'ip_address' => $ip,
            'slug' => $slug,
        ]);

        if ($request->hasFile('evidence_images')) {
            $paths = \App\Helpers\FileHelper::uploadMultipleImages($request->file('evidence_images'), 'reports');
            $report->update(['evidence_images' => $paths]);
        }

        if ($request->ajax()) {
            return response()->json(['redirect' => route('home')]);
        }

        return redirect()->route('home')
            ->with('success', 'Báo cáo đã được gửi và đang chờ kiểm duyệt.');
    }

    public function show(string $slug)
    {
        $report = Report::where('slug', $slug)
            ->where('status', 'approved')
            ->firstOrFail();

        $cacheKey = 'view_'.$report->id.'_'.request()->ip();
        if (! Cache::has($cacheKey)) {
            $report->incrementViewCount();
            Cache::put($cacheKey, true, now()->addHours(24));
        }

        $displayReporterName = StringHelper::mask_reporter_name($report->reporter_name);

        $reportsCount = Report::where('target_id', $report->target_id)
            ->where('status', 'approved')
            ->count();

        $totalSearchCount = Report::where('target_id', $report->target_id)
            ->where('status', 'approved')
            ->max('search_count');

        $relatedReports = Report::where('status', 'approved')
            ->where('id', '!=', $report->id)
            ->where(function ($q) use ($report) {
                if (! empty($report->target_bank)) {
                    $q->where('target_bank', $report->target_bank);
                }

                $q->orWhere('type', $report->type);
            })
            ->latest()
            ->limit(4)
            ->get();

        $latestReports = Report::where('status', 'approved')
            ->where('id', '!=', $report->id)
            ->latest()
            ->limit(3)
            ->get();

        $comments = $report->comments()->latest()->get();
        $stats = [
            'total_scammers' => Report::where('status', 'approved')->count(DB::raw('DISTINCT target_id')),
            'total_comments' => DB::table('comments')->count(),
        ];

        // Advanced SEO
        $siteTitle = ConfigHelper::getConfig('site_title', 'CheckScam');
        $targetId = $report->target_id;
        $targetName = $report->target_name ?? 'Đối tượng';
        $category = $report->category ?? 'Lừa đảo';

        // Optimize Title: STK/SĐT/FB - Name - Lừa đảo | SiteTitle
        $metaTitle = "{$targetId} - {$targetName} - {$category} Lừa Đảo | {$siteTitle}";
        $metaDesc = "Cảnh báo: {$targetName} ({$targetId}) bị tố cáo lừa đảo với hình thức {$category}. ".Str::limit($report->description, 150).' Xem bằng chứng và cảnh báo tại CheckScam.';

        SEOTools::setTitle($metaTitle);
        SEOTools::setDescription($metaDesc);
        SEOTools::metatags()->addKeyword("{$targetId}, {$targetName}, lừa đảo, scammer, {$category}, check scam");
        SEOTools::opengraph()->addProperty('type', 'article');

        if (! empty($report->evidence_images)) {
            $firstImg = $report->evidence_images[0];
            $imgUrl = filter_var($firstImg, FILTER_VALIDATE_URL) ? $firstImg : asset('storage/'.$firstImg);

            // For OpenGraph, we use addImages to replace/set the list
            SEOTools::opengraph()->addImages([$imgUrl]);
            SEOTools::jsonLd()->addImage($imgUrl);
        }

        // Structured Data for Scam Report (using Review/Article hybrid)
        SEOTools::jsonLd()->setTitle($metaTitle);
        SEOTools::jsonLd()->setDescription($metaDesc);
        SEOTools::jsonLd()->setType('Article');
        SEOTools::jsonLd()->addValue('author', [
            '@type' => 'Organization',
            'name' => 'CheckScam.vn',
        ]);
        SEOTools::jsonLd()->addValue('publisher', [
            '@type' => 'Organization',
            'name' => 'CheckScam.vn',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => filter_var(ConfigHelper::getConfig('logo'), FILTER_VALIDATE_URL) ? ConfigHelper::getConfig('logo') : asset('storage/'.ConfigHelper::getConfig('logo')),
            ],
        ]);
        SEOTools::jsonLd()->addValue('datePublished', $report->created_at->toIso8601String());
        SEOTools::jsonLd()->addValue('headline', "Cảnh báo lừa đảo: {$targetName} - {$targetId}");

        return view('scammer.index', compact(
            'report',
            'displayReporterName',
            'reportsCount',
            'totalSearchCount',
            'relatedReports',
            'latestReports',
            'stats',
            'comments',
        ));
    }
}
