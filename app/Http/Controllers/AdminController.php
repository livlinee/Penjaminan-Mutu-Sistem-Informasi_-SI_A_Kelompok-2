<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Mentor; // <-- 1. Tambahkan ini
use Illuminate\Support\Facades\File; // <-- 1. Tambahkan ini untuk Hapus File
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiExport;

class AdminController extends Controller
{
    /**
     * Halaman Dashboard (Beranda)
     */
    public function dashboardIndex()
    {
        return view('dashboard');
    }

    // ===============================================
    // --- LOGIKA MANAJEMEN MENU ---
    // ===============================================

    /**
     * Menampilkan halaman daftar menu.
     */
    public function menuIndex()
    {
        $menus = Menu::all();
        return view('admin.menu-index', [
            'menus' => $menus
        ]);
    }

    /**
     * Menampilkan form tambah menu baru.
     */
    public function menuCreate()
    {
        return view('admin.menu-create');
    }

    /**
     * Menyimpan menu baru ke database.
     */
    public function menuStore(Request $request)
    {
        if ($request->input('rate_menu') === '') {
            $request->merge(['rate_menu' => null]);
        }
        $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|in:Makanan,Minuman',
            'harga' => 'required|numeric|min:0',
            'deskripsi_menu' => 'required|string',
            'rate_menu' => 'nullable|numeric|min:0|max:5', // Validasi ini sekarang benar
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = 'default-menu.png'; // Gambar default
        if ($request->hasFile('gambar_menu')) {
            $imageName = time() . '.' . $request->gambar_menu->extension();
            $request->gambar_menu->move(public_path('images'), $imageName);
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'deskripsi_menu' => $request->deskripsi_menu,
            'gambar_menu' => $imageName,
            'rate_menu' => $request->input('rate_menu', 0)
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit menu.
     */
    public function menuEdit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu-edit', [
            'menu' => $menu
        ]);
    }

    /**
     * Mengupdate menu di database.
     */
    public function menuUpdate(Request $request, $id)
    {
        if ($request->input('rate_menu') === '') {
            $request->merge(['rate_menu' => null]);
        }
        $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|in:Makanan,Minuman',
            'harga' => 'required|numeric|min:0',
            'deskripsi_menu' => 'required|string',
            'rate_menu' => 'nullable|numeric|min:0|max:5',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::findOrFail($id);
        $data = $request->only(['nama_menu', 'kategori', 'harga', 'deskripsi_menu']);
        $data['rate_menu'] = $request->input('rate_menu', 0);

        if ($request->hasFile('gambar_menu')) {
            // Hapus gambar lama (jika bukan default)
            if ($menu->gambar_menu != 'default-menu.png' && File::exists(public_path('images/' . $menu->gambar_menu))) {
                File::delete(public_path('images/' . $menu->gambar_menu));
            }

            $imageName = time() . '.' . $request->gambar_menu->extension();
            $request->gambar_menu->move(public_path('images'), $imageName);
            $data['gambar_menu'] = $imageName;
        }

        $menu->update($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Menghapus menu dari database.
     */
    public function menuDestroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus gambar dari storage (jika bukan default)
        if ($menu->gambar_menu != 'default-menu.png' && File::exists(public_path('images/' . $menu->gambar_menu))) {
            File::delete(public_path('images/' . $menu->gambar_menu));
        }

        $menu->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }


    // ===============================================
    // --- LOGIKA MANAJEMEN MENTOR ---
    // ===============================================

    public function mentorIndex()
    {
        $mentors = Mentor::all();
        return view('admin.mentor-index', [
            'mentors' => $mentors
        ]);
    }

    public function mentorCreate()
    {
        return view('admin.mentor-create');
    }

    public function mentorStore(Request $request)
    {
        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'materi' => 'required|string',
            'jadwal_dan_waktu' => 'required|string|max:100',
            'kontak' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = 'default-mentor.png';
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/mentors'), $imageName);
        }

        Mentor::create([
            'nama_mentor' => $request->nama_mentor,
            'materi' => $request->materi,
            'jadwal_dan_waktu' => $request->jadwal_dan_waktu,
            'kontak' => $request->kontak,
            'gambar' => $imageName,
        ]);

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil ditambahkan.');
    }

    public function mentorEdit($id_mentor)
    {
        $mentor = Mentor::findOrFail($id_mentor);
        return view('admin.mentor-edit', [
            'mentor' => $mentor
        ]);
    }

    public function mentorUpdate(Request $request, $id_mentor)
    {
        $mentor = Mentor::findOrFail($id_mentor);

        $request->validate([
            'nama_mentor' => 'required|string|max:100',
            'materi' => 'required|string',
            'jadwal_dan_waktu' => 'required|string|max:100',
            'kontak' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_mentor', 'materi', 'jadwal_dan_waktu', 'kontak']);

        if ($request->hasFile('gambar')) {
            if ($mentor->gambar != 'default-mentor.png' && File::exists(public_path('images/mentors/' . $mentor->gambar))) {
                File::delete(public_path('images/mentors/' . $mentor->gambar));
            }
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/mentors'), $imageName);
            $data['gambar'] = $imageName;
        }

        $mentor->update($data);

        return redirect()->route('admin.mentor.index')->with('success', 'Data mentor berhasil diperbarui.');
    }

    public function mentorDestroy($id_mentor)
    {
        $mentor = Mentor::findOrFail($id_mentor);

        if ($mentor->gambar != 'default-mentor.png' && File::exists(public_path('images/mentors/' . $mentor->gambar))) {
            File::delete(public_path('images/mentors/' . $mentor->gambar));
        }

        $mentor->delete();
        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil dihapus.');
    }
    // ===================================
    // --- LOGIKA LAPORAN TRANSAKSI ---
    // ===================================

    /**
     * 2. Tambahkan method baru ini
     * Menampilkan halaman laporan transaksi.
     */
    public function transaksiIndex()
    {
        // Ambil semua transaksi, urutkan dari terbaru
        $transaksis = Transaksi::orderBy('created_at', 'desc')->get();

        // Grup semua transaksi berdasarkan 'order_group_id'
        // Ini akan mengelompokkan item-item yang dibeli bersamaan
        $groupedTransactions = $transaksis->groupBy('order_group_id');

        return view('admin.transaksi-index', [
            'groupedTransactions' => $groupedTransactions
        ]);
    }
    public function transaksiExport()
    {
        // Ini akan memanggil class TransaksiExport dan mengunduh filenya
        return Excel::download(new TransaksiExport, 'laporan_transaksi_cyber_cafe.xlsx');
    }
}
