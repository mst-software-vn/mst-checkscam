<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:6'],
        ]);
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = User::find(Auth::id());
            if (! $user->isActive()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Tài khoản của bạn đã bị vô hiệu hóa!',
                ]);
            }
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
