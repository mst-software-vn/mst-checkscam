<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

class SocialiteController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('newfeed.index')->with('error', 'Đăng nhập Google thất bại. Vui lòng thử lại.');
        }

        $user = User::where('google_id', $googleUser->getId())->first();

        if ($user) {
            $user->update([
                'full_name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ]);
        } else {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'username' => $this->generateUniqueUsername($googleUser),
                'full_name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'role' => 'user',
                'status' => 1,
            ]);
        }

        Auth::login($user, true);

        return redirect()->route('newfeed.index');
    }

    private function generateUniqueUsername(SocialiteUser $googleUser): string
    {
        $base = Str::slug(Str::before($googleUser->getEmail() ?? $googleUser->getName(), '@'), '');
        $base = $base !== '' ? $base : 'user';

        $username = $base;
        $counter = 2;

        while (User::where('username', $username)->exists()) {
            $username = $base.$counter;
            $counter++;
        }

        return $username;
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('newfeed.index');
    }
}
