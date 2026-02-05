<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed.');
        }

        $email    = $googleUser->getEmail();
        $name     = $googleUser->getName();
        $googleId = $googleUser->getId();
        $avatar   = $googleUser->getAvatar();

        // Update atau buat user baru
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'full_name'      => $name,
                'google_id' => $googleId,
                'avatar'    => $avatar,
                'password'  => bcrypt(Str::random(16)),
                'email_verified_at' => now()
            ]
        );

        Auth::login($user);
        return redirect('/dashboard')->with('success', 'Logged in with Google successfully.');
    }
}
