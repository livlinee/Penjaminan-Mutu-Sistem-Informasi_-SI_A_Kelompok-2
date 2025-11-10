@section('hide_main_header', true)
@section('remove_main_padding', true)

@extends('layout.main')

@section('title', 'Keranjang - Cyber Cafe')

@section('content')
    <div x-data="{
        cartEmpty: {{ empty($items) ? 'true' : 'false' }},
        csrfToken: document.querySelector('meta[name=\'csrf-token\']').content
    }">

        <nav class="bg-green-600 text-white p-4 flex justify-between items-center top-0 z-10 sm:rounded-b-lg">
            <div>
                <h1 class="font-bold text-xl">Cyber Cafe</h1>
                <p class="text-sm">Keranjang</p>
            </div>
            <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
        </nav>



        <div class="bg-white rounded-t-3xl shadow-lg -mt-4 relative pb-32">
            <div class="max-w-xl mx-auto p-5 space-y-4">

                <div x-show="cartEmpty" class="text-center text-gray-500 pt-10">
                    Keranjang Anda kosong.
                </div>

                @foreach ($items as $item)
                    <div x-data="{
                        quantity: {{ $item['quantity'] }},
                        subtotal: '{{ 'Rp. ' . number_format($item['price'] * $item['quantity'], 0, ',', '.') }}',
                        isRemoving: false,
                    
                        updateQuantity(newQty) {
                            this.quantity = newQty;
                    
                            fetch('{{ route('keranjang.update', $item['id_menu']) }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken,
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({ quantity: this.quantity })
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        this.subtotal = data.newSubtotalFormatted;
                                        // Update total di footer secara manual
                                        document.getElementById('grand-total').innerText = data.grandTotalFormatted;
                                    }
                                });
                        },
                    
                        removeItem() {
                            this.isRemoving = true;
                            fetch('{{ route('keranjang.hapus', $item['id_menu']) }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken,
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        // Update total di footer
                                        document.getElementById('grand-total').innerText = data.grandTotalFormatted;
                                        if (data.cartEmpty) {
                                            cartEmpty = true;
                                        }
                                    }
                                });
                        }
                    }" x-show="!isRemoving" x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90" class="flex items-center gap-4 border-b pb-4">

                        <img src="{{ asset('images/' . $item['image']) }}"
                            class="w-20 h-20 rounded-lg object-cover shadow-md">

                        <div class="flex-1 space-y-1">
                            <div class="flex justify-between items-start">
                                <h3 class="font-semibold">{{ $item['name'] }}</h3>

                                <button type="button" @click="removeItem()"
                                    class="text-gray-400 hover:text-red-500 text-xl">&times;</button>
                            </div>
                            <p class="text-xs text-gray-400" x-text="quantity + 'pcs, Price'">1pcs, Price</p>

                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <button type="button" @click="if (quantity > 1) updateQuantity(quantity - 1)"
                                        class="bg-gray-200 rounded-full w-6 h-6 flex items-center justify-center font-bold text-gray-600">-</button>

                                    <span class="font-bold" x-text="quantity"></span>

                                    <button type="button" @click="updateQuantity(quantity + 1)"
                                        class="bg-green-700 text-white rounded-full w-6 h-6 flex items-center justify-center font-bold">+</button>
                                </div>

                                <span class="font-semibold text-sm" x-text="subtotal"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div x-show="!cartEmpty"
                class="fixed bottom-0 left-0 right-0 bg-white p-5 border-t shadow-[0_-4px_10px_rgba(0,0,0,0.05)]"
                style="display: none;" <div class="max-w-xl mx-auto">
                <a href="{{ route('pembayaran.index') }}"
                    class="bg-green-700 text-white font-bold py-4 px-6 rounded-lg w-full flex justify-between items-center transition hover:bg-green-800">
                    <span>Pergi ke Pembayaran</span>

                    <span id="grand-total" class="bg-green-800/50 text-white text-sm font-semibold px-3 py-1 rounded">
                        Rp. {{ number_format($total, 0, ',', '.') }}
                    </span>
                </a>
            </div>
        </div>

    </div>
    </div>
@endsection
