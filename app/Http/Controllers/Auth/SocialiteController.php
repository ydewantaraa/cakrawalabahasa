<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect pengguna ke halaman otentikasi Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Tangani callback otentikasi dari Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        try {
            // Ambil data pengguna dari Socialite
            $socialUser = Socialite::driver('google')->user();

            // Cari pengguna berdasarkan google_id
            $user = User::where('google_id', $socialUser->id)->first();

            // Jika pengguna tidak ditemukan, buat yang baru
            if (!$user) {
                $user = User::create([
                    'google_id' => $socialUser->id,
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => bcrypt(uniqid()), // Atur password sementara
                ]);
            }
            
            // Login pengguna dan arahkan ke dashboard
            Auth::login($user);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            // Tangani error dengan pesan yang lebih informatif
            // Contoh: InvalidStateException atau GuzzleHttp errors
            return redirect('/login')->with('error', 'Login Google gagal: ' . $e->getMessage());
        }
    }
}