<?php

namespace App\Http\Controllers;

use App\Helpers\ConfigHelper;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index(Request $request)
    {
        $query = Insurance::where('status', 1);

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
        $siteTitle = ConfigHelper::getConfig('site_title', 'CheckScam.vn');
        $meta = [
            'title' => $insurance->full_name.' | Quỹ bảo hiểm uy tín - '.$siteTitle,
            'description' => 'Thông tin bảo hiểm của '.$insurance->full_name.' với số tiền '.number_format($insurance->amount).' VNĐ. Cam kết uy tín và an toàn tuyệt đối tại '.$siteTitle.'.',
            'keywords' => 'bảo hiểm, tín nhiệm, '.$insurance->full_name.', uy tín',
        ];

        return view('insurances.detail', compact('insurance', 'meta'));
    }
}
