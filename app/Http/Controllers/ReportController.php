<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function report(Request $request)
    {
        $validated = $request->validate([
            'bank_owner' => ['required', 'string'],
            'bank_number' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
            'bank_owner' => ['required', 'string'],
            'reporter_name' => ['required', 'string'],
            'report_contact' => ['required', 'string'],
            'confirm_report' => ['required', 'boolean'],
        ]);
    }
}
