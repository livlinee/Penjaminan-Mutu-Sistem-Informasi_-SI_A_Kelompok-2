@if (isset($cart_item_count) &&
        $cart_item_count > 0 &&
        !request()->routeIs('keranjang.index') &&
        !request()->routeIs('*.detail') &&
        !request()->routeIs('pembayaran.index') &&
        !request()->routeIs('pembayaran.proses'))
    <div class="fixed bottom-4 left-1/2 -translate-x-1/2 z-50 w-full max-w-xs px-4">
        <a href="{{ route('keranjang.index') }}"
            class="flex items-center justify-center bg-green-700 text-white px-5 py-4 rounded-xl font-semibold shadow-lg hover:bg-green-800 w-full">

            Pergi ke Keranjang ({{ $cart_item_count }})
        </a>
    </div>
@endif
