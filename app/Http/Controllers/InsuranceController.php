<?php

namespace App\Http\Controllers;

use App\Models\Insurance;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::where('status', 1)
            ->orderBy('id', 'asc')
            ->paginate(100);

        return view('insurances.index', compact('insurances'));
    }

    public function show($slug)
    {
        $insurance = Insurance::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('insurances.detail', compact('insurance'));
    }
}
