<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.auth.profile');
    }
    public function update(Request $request)
{
    // 1. Bersihkan/Format input sebelum validasi menggunakan merge
    $request->merge([
        'nohp' => str($request->nohp)->toString(),
    ]);

    // 2. Jalankan Validasi
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nohp' => 'required|string|max:20', // Sesuaikan panjang nomor HP
        'asal_sekolah' => 'required|string|max:255',
    ]);

    // 3. Update data User yang sedang login
    // Gunakan variabel $validated agar data yang masuk ke DB adalah data yang sudah bersih
    Auth::user()->update($validated);

    // 4. Redirect dengan pesan sukses
    return redirect()->route('profile')->with('success', 'Data Kamu berhasil diperbarui!');
}
}
