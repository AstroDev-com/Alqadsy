<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(rand(100000, 999999)),
                    'provider' => 'google',
                    'provider_id' => $googleUser->id,
                ]);
            }

            Auth::login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard_control')->with('error', 'حدث خطأ أثناء تسجيل الدخول عبر Google');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::where('email', $facebookUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => bcrypt(rand(100000, 999999)),
                    'provider' => 'facebook',
                    'provider_id' => $facebookUser->id,
                ]);
            }

            Auth::login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard_control')->with('error', 'حدث خطأ أثناء تسجيل الدخول عبر Facebook');
        }
    }
}
