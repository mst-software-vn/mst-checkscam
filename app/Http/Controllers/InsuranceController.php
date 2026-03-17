<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigHelper;
use App\Models\Insurance;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index(Request $request)
    {
        SEOTools::setTitle('Quỹ bảo hiểm uy tín - Tra cứu lừa đảo');
        SEOTools::setDescription('Danh sách các thành viên, đơn vị đã tham gia đóng quỹ bảo hiểm tín nhiệm, đảm bảo an toàn khi giao dịch.');

        $query = Insurance::where('status', 1);
        // ... rest of index ...
        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $insurances = $query->orderBy('id', 'asc')->get();

        $total_fund = Insurance::where('status', 1)->sum('amount');
        $total_members = Insurance::where('status', 1)->count();

        return view('insurances.index', compact('insurances', 'total_fund', 'total_members'));
    }

    public function show($slug)
    {
        $insurance = Insurance::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        // Advanced SEO
        $siteTitle = ConfigHelper::getConfig('site_title', 'CheckScam');
        $metaTitle = "Xác Minh Tín Nhiệm: {$insurance->full_name} | Bảo Hiểm {$siteTitle}";
        $metaDesc = "{$insurance->full_name} đã tham gia quỹ bảo hiểm CheckScam với số tiền ".number_format($insurance->amount).' VNĐ. Đã được MST CheckScam xác minh danh tính và uy tín. An tâm tuyệt đối khi giao dịch.';

        SEOTools::setTitle($metaTitle);
        SEOTools::setDescription($metaDesc);
        SEOTools::metatags()->addKeyword("bảo hiểm, tín nhiệm, {$insurance->full_name}, uy tín giao dịch, check scam, quỹ bảo hiểm mmo");
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'profile');
        SEOTools::opengraph()->setTitle($metaTitle);
        SEOTools::opengraph()->setDescription($metaDesc);
        SEOTools::opengraph()->addImage($insurance->avatar_url);

        // Structured Data for Trust/Insurance Member
        SEOTools::jsonLd()->setTitle($metaTitle);
        SEOTools::jsonLd()->setDescription($metaDesc);
        SEOTools::jsonLd()->setType('ProfessionalService');
        SEOTools::jsonLd()->addImage($insurance->avatar_url);
        SEOTools::jsonLd()->addValue('name', $insurance->full_name);
        SEOTools::jsonLd()->addValue('priceRange', '$$$');
        SEOTools::jsonLd()->addValue('address', [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Vietnam',
            'addressCountry' => 'VN',
        ]);

        return view('insurances.detail', compact('insurance'));
    }
}
