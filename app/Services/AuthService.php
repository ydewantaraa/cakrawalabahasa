<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

    public function generateResetToken(string $email): string
    {
        $user = User::where('email', $email)->firstOrFail();
        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        return $token;
    }

    public function resetPassword(string $email, string $token, string $password): bool
    {
        $record = DB::table('password_resets')->where('email', $email)->first();
        if (!$record || !Hash::check($token, $record->token)) return false;

        $user = User::where('email', $email)->first();
        $user->password = Hash::make($password);
        $user->save();

        DB::table('password_resets')->where('email', $email)->delete();

        return true;
    }
}
