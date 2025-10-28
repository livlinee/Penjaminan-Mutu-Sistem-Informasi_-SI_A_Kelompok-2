<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Menu;
use App\Models\DetailKeranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Mail;
use App\Mail\StrukPembelianMail;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function makanan()
    {
        $makanan = Menu::where('kategori', 'Makanan')->get();

        return view('pages.makanan', [
            'makanan' => $makanan
        ]);
    }

    public function showMakanan($id)
    {
        $item = Menu::findOrFail($id);

        return view('pages.makanan-detail', [
            'item' => $item
        ]);
    }
    public function minuman()
    {
        $minuman = Menu::where('kategori', 'Minuman')->get();

        return view('pages.minuman', [
            'minuman' => $minuman
        ]);
    }

    public function showMinuman($id)
    {
        $item = Menu::findOrFail($id);

        return view('pages.minuman-detail', [
            'item' => $item
        ]);
    }

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

    public function store(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|exists:menu,id_menu',
            'quantity' => 'required|integer|min:1'
        ]);

        $menu = Menu::findOrFail($request->id_menu);

        $cart = session()->get('cart', []);
        $id = $menu->id_menu;
        $quantity = (int)$request->quantity;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id_menu'   => $id,
                'name'      => $menu->nama_menu,
                'price'     => $menu->harga,
                'quantity'  => $quantity,
                'image'     => $menu->gambar_menu
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('makanan')->with('cart_success', 'Item berhasil ditambahkan!');
    }

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

        $grandTotal = 0;
        $newSubtotal = 0;
        foreach (session()->get('cart', []) as $item) {
            $itemSubtotal = $item['price'] * $item['quantity'];
            $grandTotal += $itemSubtotal;
            if ($item['id_menu'] == $id_menu) {
                $newSubtotal = $itemSubtotal;
            }
        }

        return response()->json([
            'success' => true,
            'newSubtotalFormatted' => 'Rp. ' . number_format($newSubtotal, 0, ',', '.'),
            'grandTotalFormatted' => 'Rp. ' . number_format($grandTotal, 0, ',', '.'),
        ]);
    }

    public function hapus($id_menu)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id_menu])) {
            unset($cart[$id_menu]);
            session()->put('cart', $cart);
        }

        $grandTotal = 0;
        foreach (session()->get('cart', []) as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'grandTotalFormatted' => 'Rp. ' . number_format($grandTotal, 0, ',', '.'),
            'cartEmpty' => count(session()->get('cart', [])) === 0
        ]);
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('makanan');
    }

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

    public function prosesPage(Request $request)
    {
        $payment_method = $request->query('payment_method');
        if (!$payment_method || !in_array($payment_method, ['cash', 'dana', 'gopay', 'grabpay', 'ovo', 'brizzi'])) {
            return redirect()->route('pembayaran.index')->withErrors(['payment_method' => 'Silakan pilih metode pembayaran yang valid.']);
        }
        return view('pages.pembayaran-proses', ['payment_method' => $payment_method]);
    }

    public function konfirmasiPembayaran(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|in:cash,dana,gopay,grabpay,ovo,brizzi',
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'required|integer|min:1',
            'email' => 'required|email',
        ]);

        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->route('makanan')->with('error', 'Keranjang Anda kosong.');
        }

        $orderGroupId = mt_rand(1000, 9999) . ' ' . mt_rand(1000, 9999) . ' ' . mt_rand(1000, 9999);

        $grandTotal = 0;
        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        foreach ($cart as $item) {

            $detail = DetailKeranjang::create([
                'id_menu' => $item['id_menu'],
                'jumlah_menu' => $item['quantity'],
                'sub_harga' => $item['price'] * $item['quantity'],
                'total_pembayaran' => $item['price'] * $item['quantity']
            ]);

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
        }

        session()->forget('cart');

        return view('pages.pembayaran-sukses', [
            'order_group_id' => $orderGroupId
        ]);
    }
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
