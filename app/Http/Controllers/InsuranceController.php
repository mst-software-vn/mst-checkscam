<?php

namespace App\Http\Controllers;

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

        $insurances = $query->orderBy('id', 'asc')
            ->paginate(100);

        // Thống kê động
        $total_fund = Insurance::where('status', 1)->sum('amount');
        $total_members = Insurance::where('status', 1)->count();

        return view('insurances.index', compact('insurances', 'total_fund', 'total_members'));
    }

    public function show($slug)
    {
        $insurance = Insurance::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('insurances.detail', compact('insurance'));
    }
}
