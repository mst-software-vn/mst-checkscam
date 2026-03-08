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
            return 'Login rồi, redirect thôi';
        }

        return view('admin.auth.login');
    }

    // POST Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['require', 'string', 'email'],
            'passwowrd' => ['required', 'min:6'],
        ]);
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = User::find(Auth::id());
            if (! $user->isActive()) {
                Auth::logout();

                return back()->withErrors([
                    'username' => 'Tài khoản của bạn đã bị vô hiệu hóa!',
                ]);
            }
            $request->session()->regenerate(); // Chống session fixation

            // return redirect()->intended(route('admin.dashboard'));
            return 'Login thành công nha bé!';
        }

        return back()->withErrors([
            'username' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
        ])->onlyInput('username');
    }
}
