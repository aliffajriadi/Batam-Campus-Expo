<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class GoogleController extends Controller
{
    // Mengarahkan user ke halaman login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Mengambil data user dari Google setelah login berhasil
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan email, jika tidak ada maka buat baru
            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'photo' => $googleUser->avatar,
                'password' => null, // Login lewat google tidak butuh pass
                'email_verified_at' => now(),
            ]);

            if ($user->is_suspended) {
                return redirect('/')->with('error', 'Akun Anda sedang ditangguhkan. Silakan hubungi admin.');
            }

            Auth::login($user, true); // True untuk remember me

            return redirect()->intended('/ticket-user'); // Arahkan ke halaman toko

        } catch (Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}
