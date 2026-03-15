<?php

namespace App\Http\Controllers\Admin;

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
        $validated = $request->validate([
            'username' => 'required|string|max:100|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'full_name' => 'required|string|max:255',
            'role' => 'required|in:admin,moderator',
            'status' => 'nullable|boolean',
        ]);

        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'full_name' => $validated['full_name'],
            'role' => $validated['role'],
            'status' => $request->boolean('status', true) ? 1 : 0,
        ]);

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

        $validated = $request->validate([
            'username' => 'required|string|max:100|unique:users,username,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
            'full_name' => 'required|string|max:255',
            'role' => 'required|in:admin,moderator',
            'status' => 'nullable|boolean',
        ]);

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

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Đã xóa người dùng thành công.');
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
            // Không được xoá chính mình hoặc account root(id=1)
            if ($user->id == 1 || $user->id == auth()->id()) {
                continue;
            }
            // Xóa ảnh đại diện (nếu tương lai có)
            if ($user->avatar) {
                // Assuming deleteImage is a helper function or a method on the User model
                // If it's a global helper, ensure it's available.
                // For now, commenting it out as it's not defined in this context.
                // deleteImage($user->avatar);
            }
            $user->delete();
            $count++;
        }

        if ($count > 0) {
            return response()->json(['success' => true, 'message' => "Đã xóa {$count} tài khoản."]);
        }

        return response()->json(['success' => false, 'message' => 'Không thể xóa các tài khoản đã chọn (có thể là admin).']);
    }
}
