<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google login failed',
            ], 400);
        }

        $email    = $googleUser->getEmail();
        $name     = $googleUser->getName();
        $googleId = $googleUser->getId();
        $avatar   = $googleUser->getAvatar();

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'full_name'        => $name,
                'google_id'        => $googleId,
                'avatar'           => $avatar,
                'password'         => bcrypt(Str::random(16)),
                'email_verified_at' => now(),
            ]
        );

        $token = $user->createToken('google_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Logged in with Google successfully',
            'data'    => [
                'user'  => $user,
                'token' => $token,
            ],
        ]);
    }
}
