<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(string $name, string $email, string $password): User
    {
        $user = User::create([
            'full_name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);

        $user->sendEmailVerificationNotification();

        return $user;
    }

    public function login(string $email, string $password): User
    {
        $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah'],
            ]);
        }

        return $user;
    }
}
