<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Panggil model Admin Anda
use Illuminate\Support\Facades\Hash; // Kita tidak pakai ini untuk cek
use Illuminate\Support\Facades\Auth; // Kita tidak pakai ini

class AdminLoginController extends Controller
{
    /**
     * Menampilkan form login admin.
     */
    public function showLoginForm()
    {
        // Kita gunakan lagi file login.blade.php dari Breeze
        return view('auth.login');
    }

    /**
     * Memproses data login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Cari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // 3. Jika admin tidak ditemukan, kembalikan error
        if (! $admin) {
            return back()->withErrors([
                'username' => 'Username tidak ditemukan.',
            ])->onlyInput('username');
        }

        // 4. INI BAGIAN PENTINGNYA:
        // Kita hash password yang diketik pengguna menggunakan sha256
        $passwordInput = $request->password;
        $hashedPasswordInput = hash('sha256', $passwordInput);

        // 5. Bandingkan hash input dengan hash di database
        if ($hashedPasswordInput === $admin->password) {

            $request->session()->regenerate();
            $request->session()->put('admin_id', $admin->id_admin);
            $request->session()->put('admin_nama', $admin->nama_lengkap);

            // Arahkan ke dashboard admin
            return redirect()->route('dashboard');
        }

        // 6. JIKA GAGAL:
        return back()->withErrors([
            'password' => 'Kata sandi salah.',
        ])->onlyInput('username');
    }

    /**
     * Memproses logout.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');
        $request->session()->forget('admin_nama');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login'); // Kembali ke halaman utama
    }
}
