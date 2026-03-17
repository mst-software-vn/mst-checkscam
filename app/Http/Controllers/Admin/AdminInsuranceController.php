<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class AdminInsuranceController extends Controller
{
    public function index(Request $request)
    {
        $query = Insurance::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->integer('status'));
        }

        if ($request->filled('time_range')) {
            switch ($request->time_range) {
                case 'today':
                    $query->whereDate('created_at', now()->today());
                    break;
                case '3_days':
                    $query->where('created_at', '>=', now()->subDays(3));
                    break;
                case '7_days':
                    $query->where('created_at', '>=', now()->subDays(7));
                    break;
                case '1_month':
                    $query->where('created_at', '>=', now()->subMonths(1));
                    break;
            }
        }

        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%'.$request->search.'%');
        }

        $insurances = $query->paginate(15)->withQueryString();

        return view('admin.insurances.index', compact('insurances'));
    }

    public function create()
    {
        return view('admin.insurances.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'insurance_date' => 'required|date',
            'expired_at' => 'required|date|after_or_equal:insurance_date',
            'status' => 'required|in:0,1',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'contact_info' => 'required|array|min:1',
            'contact_info.*.platform' => 'required|string|max:100',
            'contact_info.*.link' => 'required|string|max:500',
            'payment_accounts' => 'required|array|min:1',
            'payment_accounts.*.bank' => 'required|string|max:100',
            'payment_accounts.*.number' => 'required|string|max:100',
            'payment_accounts.*.name' => 'required|string|max:255',
            'services' => 'required|array|min:1',
            'services.*.title' => 'required|string|max:255',
        ]);

        $contactInfo = $this->filterEmptyArrayItems($validated['contact_info'] ?? [], ['platform', 'link']);
        $paymentAccounts = $this->filterEmptyArrayItems($validated['payment_accounts'] ?? [], ['bank', 'number']);
        $services = $this->filterEmptyArrayItems($validated['services'] ?? [], ['title']);

        $globalSlug = $this->generateInsuranceSlug($validated['full_name']);

        $insurance = Insurance::create([
            'full_name' => $validated['full_name'],
            'slug' => $globalSlug,
            'amount' => $validated['amount'],
            'insurance_date' => $validated['insurance_date'],
            'expired_at' => $validated['expired_at'],
            'status' => $validated['status'],
            'contact_info' => $contactInfo ?: null,
            'payment_accounts' => $paymentAccounts ?: null,
            'services' => $services ?: null,
        ]);

        if ($request->hasFile('avatar')) {
            $insurance->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            // Legacy support
            $insurance->update(['avatar' => $insurance->getFirstMedia('avatar')->file_name]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm thành viên bảo hiểm thành công.',
                'redirect' => route('admin.insurances.index'),
            ]);
        }

        return redirect()->route('admin.insurances.index')
            ->with('success', 'Đã thêm thành viên bảo hiểm thành công.');
    }

    public function edit(int $id)
    {
        $insurance = Insurance::findOrFail($id);

        return view('admin.insurances.create', compact('insurance'));
    }

    public function update(Request $request, int $id)
    {
        $insurance = Insurance::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'insurance_date' => 'required|date',
            'expired_at' => 'required|date|after_or_equal:insurance_date',
            'status' => 'required|in:0,1',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'contact_info' => 'required|array|min:1',
            'contact_info.*.platform' => 'required|string|max:100',
            'contact_info.*.link' => 'required|string|max:500',
            'payment_accounts' => 'required|array|min:1',
            'payment_accounts.*.bank' => 'required|string|max:100',
            'payment_accounts.*.number' => 'required|string|max:100',
            'payment_accounts.*.name' => 'required|string|max:255',
            'services' => 'required|array|min:1',
            'services.*.title' => 'required|string|max:255',
        ]);

        $contactInfo = $this->filterEmptyArrayItems($validated['contact_info'] ?? [], ['platform', 'link']);
        $paymentAccounts = $this->filterEmptyArrayItems($validated['payment_accounts'] ?? [], ['bank', 'number']);
        $services = $this->filterEmptyArrayItems($validated['services'] ?? [], ['title']);

        $globalSlug = $insurance->slug;
        if ($insurance->full_name !== $validated['full_name']) {
            $globalSlug = $this->generateInsuranceSlug($validated['full_name'], $insurance->id);
        }

        $insurance->update([
            'full_name' => $validated['full_name'],
            'slug' => $globalSlug,
            'amount' => $validated['amount'],
            'insurance_date' => $validated['insurance_date'],
            'expired_at' => $validated['expired_at'],
            'status' => $validated['status'],
            'contact_info' => $contactInfo ?: null,
            'payment_accounts' => $paymentAccounts ?: null,
            'services' => $services ?: null,
        ]);

        if ($request->hasFile('avatar')) {
            $insurance->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            // Legacy support
            $insurance->update(['avatar' => $insurance->getFirstMedia('avatar')->file_name]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã cập nhật thông tin bảo hiểm thành công.',
                'redirect' => route('admin.insurances.index'),
            ]);
        }

        return redirect()->route('admin.insurances.index')
            ->with('success', 'Đã cập nhật thông tin bảo hiểm thành công.');
    }

    private function generateInsuranceSlug(string $name, ?int $excludeId = null): string
    {
        $baseSlug = \Illuminate\Support\Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (Insurance::where('slug', $slug)->where('id', '!=', $excludeId)->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    public function destroy(int $id)
    {
        $insurance = Insurance::findOrFail($id);

        if ($insurance->avatar) {
            FileHelper::deleteImage($insurance->avatar);
        }

        $insurance->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa thành viên bảo hiểm thành công.',
            ]);
        }

        return redirect()->route('admin.insurances.index')
            ->with('success', 'Đã xóa thành viên bảo hiểm.');
    }

    private function filterEmptyArrayItems(array $items, array $requiredKeys): array
    {
        return array_values(array_filter($items, function ($item) use ($requiredKeys) {
            foreach ($requiredKeys as $key) {
                if (! empty($item[$key] ?? null)) {
                    return true;
                }
            }

            return false;
        }));
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Không có mục nào được chọn.']);
        }

        $insurances = Insurance::whereIn('id', $ids)->get();
        foreach ($insurances as $insurance) {
            if ($insurance->avatar) {
                FileHelper::deleteImage($insurance->avatar);
            }
            $insurance->delete();
        }

        return response()->json(['success' => true, 'message' => 'Đã xóa '.count($insurances).' mục thành công.']);
    }
}
