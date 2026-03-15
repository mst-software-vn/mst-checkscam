<?php

namespace App\Http\Controllers\Admin;

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
            'slug' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'insurance_date' => 'required|date',
            'expired_at' => 'nullable|date|after_or_equal:insurance_date',
            'status' => 'required|in:0,1',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'contact_info' => 'nullable|array',
            'contact_info.*.platform' => 'nullable|string|max:100',
            'contact_info.*.link' => 'nullable|string|max:500',
            'payment_accounts' => 'nullable|array',
            'payment_accounts.*.bank' => 'nullable|string|max:100',
            'payment_accounts.*.number' => 'nullable|string|max:100',
            'payment_accounts.*.name' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*.title' => 'nullable|string|max:255',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = uploadImage($request->file('avatar'), 'insurances');
        }

        $contactInfo = $this->filterEmptyArrayItems($validated['contact_info'] ?? [], ['platform', 'link']);
        $paymentAccounts = $this->filterEmptyArrayItems($validated['payment_accounts'] ?? [], ['bank', 'number']);
        $services = $this->filterEmptyArrayItems($validated['services'] ?? [], ['title']);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['full_name'];
        $globalSlug = generateGlobalUniqueSlug($slugSource);

        Insurance::create([
            'full_name' => $validated['full_name'],
            'slug' => $globalSlug,
            'amount' => $validated['amount'],
            'insurance_date' => $validated['insurance_date'],
            'expired_at' => $validated['expired_at'] ?? null,
            'status' => $validated['status'],
            'avatar' => $avatarPath,
            'contact_info' => $contactInfo ?: null,
            'payment_accounts' => $paymentAccounts ?: null,
            'services' => $services ?: null,
        ]);

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
            'slug' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'insurance_date' => 'required|date',
            'expired_at' => 'nullable|date|after_or_equal:insurance_date',
            'status' => 'required|in:0,1',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'contact_info' => 'nullable|array',
            'contact_info.*.platform' => 'nullable|string|max:100',
            'contact_info.*.link' => 'nullable|string|max:500',
            'payment_accounts' => 'nullable|array',
            'payment_accounts.*.bank' => 'nullable|string|max:100',
            'payment_accounts.*.number' => 'nullable|string|max:100',
            'payment_accounts.*.name' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*.title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('avatar')) {
            if ($insurance->avatar) {
                deleteImage($insurance->avatar);
            }
            $validated['avatar'] = uploadImage($request->file('avatar'), 'insurances');
        }

        $contactInfo = $this->filterEmptyArrayItems($validated['contact_info'] ?? [], ['platform', 'link']);
        $paymentAccounts = $this->filterEmptyArrayItems($validated['payment_accounts'] ?? [], ['bank', 'number']);
        $services = $this->filterEmptyArrayItems($validated['services'] ?? [], ['title']);

        $slugSource = ! empty($validated['slug']) ? $validated['slug'] : $validated['full_name'];
        $globalSlug = generateGlobalUniqueSlug($slugSource, $insurance->id);

        $insurance->update([
            'full_name' => $validated['full_name'],
            'slug' => $globalSlug,
            'amount' => $validated['amount'],
            'insurance_date' => $validated['insurance_date'],
            'expired_at' => $validated['expired_at'] ?? null,
            'status' => $validated['status'],
            'avatar' => $validated['avatar'] ?? $insurance->avatar,
            'contact_info' => $contactInfo ?: null,
            'payment_accounts' => $paymentAccounts ?: null,
            'services' => $services ?: null,
        ]);

        return redirect()->route('admin.insurances.index')
            ->with('success', 'Đã cập nhật thông tin bảo hiểm thành công.');
    }

    public function destroy(int $id)
    {
        $insurance = Insurance::findOrFail($id);

        if ($insurance->avatar) {
            deleteImage($insurance->avatar);
        }

        $insurance->delete();

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
                deleteImage($insurance->avatar);
            }
            $insurance->delete();
        }

        return response()->json(['success' => true, 'message' => 'Đã xóa '.count($insurances).' mục thành công.']);
    }
}
