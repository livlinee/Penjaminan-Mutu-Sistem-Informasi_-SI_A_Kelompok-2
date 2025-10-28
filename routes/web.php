<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/makanan');

Route::get('/makanan', function () {
    $makanan = Menu::where('kategori', 'Makanan')->get();
    return view('pages.makanan', [
        'makanan' => $makanan
    ]);
})->name('makanan');

Route::get('/minuman', function () {
    $minuman = Menu::where('kategori', 'Minuman')->get();
    return view('pages.minuman', [
        'minuman' => $minuman
    ]);
})->name('minuman');

Route::get('/makanan/{id}', function ($id) {

    $item = Menu::findOrFail($id);

    return view('pages.makanan-detail', [
        'item' => $item
    ]);
})->name('makanan.detail');

Route::get('/minuman/{id}', function ($id) {

    $item = Menu::findOrFail($id);

    return view('pages.minuman-detail', [
        'item' => $item
    ]);
})->name('minuman.detail');

Route::post('/keranjang/tambah', [Controller::class, 'store'])->name('keranjang.tambah');

Route::get('/tes-db', function () {
    $semuaMenu = Menu::all();

    return $semuaMenu;
});

Route::get('/keranjang', [Controller::class, 'index'])->name('keranjang.index');

Route::post('/keranjang/update/{id_menu}', [Controller::class, 'update'])->name('keranjang.update');

Route::post('/keranjang/hapus/{id_menu}', [Controller::class, 'hapus'])->name('keranjang.hapus');

Route::post('/keranjang/clear', [Controller::class, 'clearCart'])->name('keranjang.clear');

Route::get('/pembayaran', [Controller::class, 'pembayaranPage'])->name('pembayaran.index');

Route::post('/pembayaran/konfirmasi', [Controller::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');

Route::get('/pembayaran', [Controller::class, 'pembayaranPage'])->name('pembayaran.index');
Route::post('/pembayaran/konfirmasi', [Controller::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');

Route::get('/pembayaran/proses', [Controller::class, 'prosesPage'])->name('pembayaran.proses');
Route::get('/struk/{order_id}', [Controller::class, 'showStruk'])->name('struk.show');
