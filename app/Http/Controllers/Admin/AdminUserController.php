<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::latest();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('time_range')) {
            switch ($request->time_range) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case '3_days':
                    $query->where('created_at', '>=', now()->subDays(3));
                    break;
                case '7_days':
                    $query->where('created_at', '>=', now()->subDays(7));
                    break;
                case '1_month':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
            }
        }

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('full_name', 'like', '%'.$keyword.'%')
                    ->orWhere('username', 'like', '%'.$keyword.'%')
                    ->orWhere('email', 'like', '%'.$keyword.'%');
            });
        }

        $users = $query->paginate(15)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:100|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'full_name' => 'required|string|max:255',
            'role' => 'required|in:admin,moderator',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|boolean',
        ];

        // ... messages ...
        $messages = [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'full_name.required' => 'Họ và tên không được để trống.',
            'role.required' => 'Vui lòng chọn vai trò.',
            'avatar.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
            'avatar.mimes' => 'Chỉ chấp nhận các định dạng: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'Dung lượng ảnh tối đa là 2MB.',
        ];

        $validated = $request->validate($rules, $messages);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'full_name' => $validated['full_name'],
            'role' => $validated['role'],
            'status' => $request->boolean('status', true) ? 1 : 0,
        ]);

        if ($request->hasFile('avatar')) {
            $path = FileHelper::uploadImage($request->file('avatar'), 'avatars');
            $user->update(['avatar' => $path]);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'Đã tạo tài khoản thành công.');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.create', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'username' => 'required|string|max:100|unique:users,username,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
            'full_name' => 'required|string|max:255',
            'role' => 'required|in:admin,moderator',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|boolean',
        ];

        // ... messages ...
        $messages = [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'full_name.required' => 'Họ và tên không được để trống.',
            'role.required' => 'Vui lòng chọn vai trò.',
            'avatar.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
            'avatar.mimes' => 'Chỉ chấp nhận các định dạng: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'Dung lượng ảnh tối đa là 2MB.',
        ];

        $validated = $request->validate($rules, $messages);

        $data = [
            'username' => $validated['username'],
            'email' => $validated['email'],
            'full_name' => $validated['full_name'],
            'role' => $validated['role'],
            'status' => $request->boolean('status', true) ? 1 : 0,
        ];

        if (! empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                FileHelper::deleteImage($user->avatar);
            }
            $data['avatar'] = FileHelper::uploadImage($request->file('avatar'), 'avatars');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Đã cập nhật thông tin tài khoản.');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Bạn không thể xóa chính mình.');
        }

        try {
            // Xóa ảnh trước
            if ($user->avatar) {
                FileHelper::deleteImage($user->avatar);
            }

            $user->delete();

            return response()->json(['success' => true, 'message' => 'Đã xóa người dùng thành công.']);

        } catch (\Exception $e) {
            return response()->json(['success' => true, 'message' => $e->getMessage()]);

        }
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Không có tài khoản nào được chọn.']);
        }

        $users = User::whereIn('id', $ids)->get();
        $count = 0;
        foreach ($users as $user) {

            if ($user->id == 1 || $user->id == auth()->id()) {
                continue;
            }

            if ($user->avatar) {
                FileHelper::deleteImage($user->avatar);
            }
            $user->delete();
            $count++;
        }

        if ($count > 0) {
            return response()->json(['success' => true, 'message' => "Đã xóa {$count} tài khoản."]);
        }

        return response()->json(['success' => false, 'message' => 'Không thể xóa các tài khoản đã chọn (có thể là admin).']);
    }

    public function toggleVerify(User $user)
    {
        $user->update(['is_verified' => ! $user->is_verified]);

        return response()->json(['is_verified' => (bool) $user->is_verified]);
    }
}
