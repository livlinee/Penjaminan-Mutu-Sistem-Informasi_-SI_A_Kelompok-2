<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;

/*
|--------------------------------------------------------------------------
| SISI PELANGGAN (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/makanan');
Route::get('/makanan', [MenuController::class, 'makanan'])->name('makanan');
Route::get('/makanan/{id}', [MenuController::class, 'showMakanan'])->name('makanan.detail');
Route::get('/minuman', [MenuController::class, 'minuman'])->name('minuman');
Route::get('/minuman/{id}', [MenuController::class, 'showMinuman'])->name('minuman.detail');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.tambah');
Route::post('/keranjang/update/{id_menu}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::post('/keranjang/hapus/{id_menu}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::post('/keranjang/clear', [KeranjangController::class, 'clearCart'])->name('keranjang.clear');

Route::get('/pembayaran', [KeranjangController::class, 'pembayaranPage'])->name('pembayaran.index');
Route::get('/pembayaran/proses', [KeranjangController::class, 'prosesPage'])->name('pembayaran.proses');
Route::post('/pembayaran/konfirmasi', [KeranjangController::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');
Route::get('/struk/{order_id}', [KeranjangController::class, 'showStruk'])->name('struk.show');

/*
|--------------------------------------------------------------------------
| SISI ADMIN (LOGIN MANUAL)
|--------------------------------------------------------------------------
*/

// 1. Rute untuk menampilkan form login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');

// 2. Rute untuk memproses login
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// 3. Rute untuk logout
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    
    // Halaman Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardIndex'])->name('dashboard');

    // --- GRUP ROUTE UNTUK MANAJEMEN MENU ---
    Route::get('/admin/menu', [AdminController::class, 'menuIndex'])->name('admin.menu.index');
    Route::get('/admin/menu/tambah', [AdminController::class, 'menuCreate'])->name('admin.menu.create');
    Route::post('/admin/menu', [AdminController::class, 'menuStore'])->name('admin.menu.store');
    Route::get('/admin/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{id}', [AdminController::class, 'menuUpdate'])->name('admin.menu.update');
    Route::delete('/admin/menu/{id}', [AdminController::class, 'menuDestroy'])->name('admin.menu.destroy');
    // ----------------------------------------
    
    // --- GRUP ROUTE UNTUK MANAJEMEN MENTOR ---
    Route::get('/admin/mentor', [AdminController::class, 'mentorIndex'])->name('admin.mentor.index');
    Route::get('/admin/mentor/tambah', [AdminController::class, 'mentorCreate'])->name('admin.mentor.create');
    Route::post('/admin/mentor', [AdminController::class, 'mentorStore'])->name('admin.mentor.store');
    Route::get('/admin/mentor/{id_mentor}/edit', [AdminController::class, 'mentorEdit'])->name('admin.mentor.edit');
    Route::put('/admin/mentor/{id_mentor}', [AdminController::class, 'mentorUpdate'])->name('admin.mentor.update');
    Route::delete('/admin/mentor/{id_mentor}', [AdminController::class, 'mentorDestroy'])->name('admin.mentor.destroy');
    // ------------------------------------------

});
