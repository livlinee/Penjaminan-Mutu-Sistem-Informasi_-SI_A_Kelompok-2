<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\DetailKeranjang;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\StrukPembelianMail;
use Carbon\Carbon;

class KeranjangController extends Controller
{
    /**
     * Menampilkan halaman keranjang dari SESSION.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('pages.keranjang', [
            'items' => $cart,
            'total' => $total
        ]);
    }

    /**
     * Menyimpan item baru ke dalam SESSION.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|exists:menu,id_menu',
            'quantity' => 'required|integer|min:1'
        ]);

        $menu = Menu::findOrFail($request->id_menu);
        // Ambil keranjang yang ada dari session
        $cart = session()->get('cart', []);
        $id = $menu->id_menu;
        $quantity = (int)$request->quantity;

        // Cek jika item sudah ada, tambahkan kuantitas
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Jika item baru, tambahkan ke array
            $cart[$id] = [
                'id_menu'   => $id,
                'name'      => $menu->nama_menu,
                'price'     => $menu->harga,
                'quantity'  => $quantity,
                'image'     => $menu->gambar_menu
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('makanan')->with('cart_success', 'Item berhasil ditambahkan!');
    }

    /**
     * Update kuantitas item di SESSION (Return JSON).
     */
    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        $new_quantity = (int)$request->quantity;

        if (isset($cart[$id_menu])) {
            $cart[$id_menu]['quantity'] = $new_quantity;
            session()->put('cart', $cart);
        }

        // Hitung ulang total
        $grandTotal = 0;
        $newSubtotal = 0;
        foreach (session()->get('cart', []) as $item) {
            $itemSubtotal = $item['price'] * $item['quantity'];
            $grandTotal += $itemSubtotal;
            if ($item['id_menu'] == $id_menu) {
                $newSubtotal = $itemSubtotal;
            }
        }

        // Kembalikan JSON
        return response()->json([
            'success' => true,
            'newSubtotalFormatted' => 'Rp. ' . number_format($newSubtotal, 0, ',', '.'),
            'grandTotalFormatted' => 'Rp. ' . number_format($grandTotal, 0, ',', '.'),
        ]);
    }

    /**
     * Menghapus item dari SESSION (Return JSON).
     */
    public function hapus($id_menu)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id_menu])) {
            unset($cart[$id_menu]);
            session()->put('cart', $cart);
        }

        // Hitung ulang total
        $grandTotal = 0;
        foreach (session()->get('cart', []) as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        // Kembalikan JSON
        return response()->json([
            'success' => true,
            'grandTotalFormatted' => 'Rp. ' . number_format($grandTotal, 0, ',', '.'),
            'cartEmpty' => count(session()->get('cart', [])) === 0
        ]);
    }

    /**
     * Mengosongkan seluruh SESSION keranjang.
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('makanan');
    }

    /**
     * Menampilkan halaman pembayaran dari SESSION.
     */
    public function pembayaranPage()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        if (empty($cart)) {
            return redirect()->route('makanan');
        }

        return view('pages.pembayaran', [
            'items' => $cart,
            'total' => $total
        ]);
    }

    /**
     * Menampilkan halaman proses (Nama & Nomor Meja).
     */
    public function prosesPage(Request $request)
    {
        $payment_method = $request->query('payment_method');
        if (!$payment_method || !in_array($payment_method, ['cash', 'dana', 'gopay', 'grabpay', 'ovo', 'brizzi'])) {
            return redirect()->route('pembayaran.index')->withErrors(['payment_method' => 'Silakan pilih metode pembayaran yang valid.']);
        }
        return view('pages.pembayaran-proses', ['payment_method' => $payment_method]);
    }

    /**
     * LOGIKA BARU:
     * 1. Ambil data dari SESSION.
     * 2. Simpan ke 'detail_keranjang' dan 'transaksi'.
     * 3. Hapus SESSION.
     */
    public function konfirmasiPembayaran(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|in:cash,dana,gopay,grabpay,ovo,brizzi',
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'required|integer|min:1',
            'email' => 'required|email',
        ]);

        // 1. Ambil keranjang dari SESSION
        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->route('makanan')->with('error', 'Keranjang Anda kosong.');
        }

        $orderGroupId = mt_rand(1000, 9999) . ' ' . mt_rand(1000, 9999) . ' ' . mt_rand(1000, 9999);

        $grandTotal = 0;
        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        // 2. Loop dan SIMPAN KE DATABASE
        foreach ($cart as $item) {
            // A. Simpan ke detail_keranjang
            $detail = DetailKeranjang::create([
                'id_menu' => $item['id_menu'],
                'jumlah_menu' => $item['quantity'],
                'sub_harga' => $item['price'] * $item['quantity'],
                'total_pembayaran' => $item['price'] * $item['quantity']
            ]);

            // B. Simpan ke transaksi (menggunakan ID dari $detail)
            Transaksi::create([
                'id_keranjang' => $detail->id_detail_keranjang,
                'total_transaksi' => $detail->sub_harga,
                'opsi_pembayaran' => $request->payment_method,
                'nama_pelanggan' => $request->nama_pelanggan,
                'email' => $request->email,
                'nomor_meja' => $request->nomor_meja,
                'order_group_id' => $orderGroupId,
            ]);
        }

        try {
            $mailData = [
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_meja'     => $request->nomor_meja,
                'order_group_id' => $orderGroupId,
                'total'          => $grandTotal,
                'items'          => $cart,
                'waktu'          => Carbon::now()->format('d F Y, H:i')
            ];

            Mail::to($request->email)->send(new StrukPembelianMail($mailData));
        } catch (\Exception $e) {
            // Jika email gagal, jangan hentikan proses
        }

        // 4. Hapus SESSION keranjang
        session()->forget('cart');

        // 5. Tampilkan halaman sukses
        return view('pages.pembayaran-sukses', [
            'order_group_id' => $orderGroupId
        ]);
    }

    /**
     * Menampilkan halaman struk.
     */
    public function showStruk($order_id)
    {
        $transaksis = Transaksi::where('order_group_id', $order_id)->get();

        if ($transaksis->isEmpty()) {
            abort(404, 'Struk tidak ditemukan.');
        }

        $data_struk = $transaksis->first();
        $total_pembayaran = $transaksis->sum('total_transaksi');

        return view('pages.struk', [
            'struk' => $data_struk,
            'total' => $total_pembayaran
        ]);
    }
}
