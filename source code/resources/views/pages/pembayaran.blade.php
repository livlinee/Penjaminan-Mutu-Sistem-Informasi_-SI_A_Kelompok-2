{{-- Halaman ini tidak pakai header & padding standar --}}
@section('hide_main_header', true)
@section('remove_main_padding', true)

@extends('layout.main')

@section('title', 'Pembayaran - Cyber Cafe')

@section('content')

    <div class="bg-gray-100 min-h-screen" x-data="{
        paymentMethod: 'cash',
        showDeleteModal: false,
        selectedEwallet: null
    }">

        <header class="bg-green-600 text-white p-4 sticky top-0 z-10">
            <div class="max-w-xl mx-auto flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-xl">Cyber Cafe</h1>
                    <p class="text-sm opacity-90">Pembayaran</p>
                </div>
                <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
            </div>


        </header>

        <div class="bg-white rounded-t-3xl shadow-lg m-5 relative pb-32">
            <div class="max-w-xl mx-auto p-5 space-y-5">

                <div class="space-y-3">
                    <h2 class="font-bold text-lg">Pemesanan anda akan disiapkan, mohon lakukan pembayaran</h2>

                    <div class="flex gap-3">

                        <a href="{{ route('keranjang.index') }}"
                            class="text-sm bg-gray-100 text-gray-700 py-2 px-4 rounded-lg flex items-center gap-2">
                            <i class="fa-solid fa-pen-to-square"></i> Edit Pesanan
                        </a>

                        <button type="button" @click="showDeleteModal = true"
                            class="text-sm bg-gray-100 text-gray-700 py-2 px-4 rounded-lg flex items-center gap-2">
                            <i class="fa-solid fa-trash"></i> Hapus Pesanan
                        </button>
                    </div>
                </div>

                <hr class="border-gray-100">

                <div class="bg-white border border-gray-200 rounded-lg p-3 flex items-center gap-3 shadow-sm">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fa-solid fa-check text-green-700"></i>
                    </div>
                    <span class="font-semibold text-gray-700">Keranjang Anda</span>
                </div>

                <div class="space-y-3">
                    <h3 class="font-semibold text-lg">Order Detail</h3>

                    @foreach ($items as $item)
                        <div class="flex justify-between items-center text-sm">
                            <p class="text-gray-700">{{ $item['name'] }}</p>
                            <p class="text-gray-900 font-medium">Rp.
                                {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between items-center text-sm text-gray-500 -mt-2">
                            <p>Jumlah pesanan</p>
                            <p>{{ $item['quantity'] }} x</p>
                        </div>
                    @endforeach

                    <hr class="border-gray-100 !my-4">
                    <div class="flex justify-between items-center font-bold text-lg">
                        <p>Total Pembayaran</p>
                        <p>Rp. {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-3 pt-4">
                        <button @click="paymentMethod = 'cash'; selectedEwallet = null"
                            :class="paymentMethod === 'cash' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700'"
                            class="flex-1 py-3 rounded-lg font-semibold transition-all">
                            <i class="fa-solid fa-money-bill-wave"></i> Cash
                        </button>
                        <button @click="paymentMethod = 'e-wallet'; selectedEwallet = 'dana'"
                            :class="paymentMethod === 'e-wallet' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700'"
                            class="flex-1 py-3 rounded-lg font-semibold transition-all">
                            <i class="fa-solid fa-wallet"></i> E-Wallet
                        </button>
                    </div>
                    <div x-show="paymentMethod === 'e-wallet'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-3 gap-3 pt-3"
                        style="display: none;">
                        @php
                            $ewallets = [
                                'dana' => 'DANA.png',
                                'gopay' => 'GOPAY.png',
                                'grabpay' => 'GRABPAY.png',
                                'ovo' => 'OVO.png',
                                'brizzi' => 'BRIZZI.png',
                            ];
                        @endphp

                        @foreach ($ewallets as $key => $logo)
                            <button type="button" @click="selectedEwallet = '{{ $key }}'"
                                :class="selectedEwallet === '{{ $key }}' ? 'border-green-500 ring-2 ring-green-500' :
                                    'border-gray-200'"
                                class="bg-white border rounded-lg p-3 h-16 flex items-center justify-center transition-all">
                                <img src="{{ asset('images/logos/' . $logo) }}" alt="{{ $key }}"
                                    class="max-h-10 object-contain">
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div x-show="showDeleteModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
            style="display: none;">

            <div @click.outside="showDeleteModal = false"
                class="relative bg-white rounded-2xl shadow-lg p-6 w-full max-w-sm space-y-4">

                <h3 class="text-xl font-semibold text-center">Hapus Pesanan?</h3>
                <p class="text-center text-gray-500 text-sm">
                    Anda yakin ingin menghapus SEMUA pesanan dari keranjang? Tindakan ini tidak dapat dibatalkan.
                </p>

                <div class="flex justify-center gap-3 pt-2">
                    <button type="button" @click="showDeleteModal = false"
                        class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg font-medium">
                        Batal
                    </button>

                    <form action="{{ route('keranjang.clear') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-5 py-2 rounded-lg font-medium shadow hover:bg-red-700">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="fixed bottom-0 left-0 right-0 bg-white p-5 border-t shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
            <div class="max-w-xl mx-auto">

                <form action="{{ route('pembayaran.proses') }}" method="GET">
                    <input type="hidden" name="payment_method"
                        :value="paymentMethod === 'cash' ? 'cash' : selectedEwallet">

                    <button type="submit" :disabled="paymentMethod === 'e-wallet' && selectedEwallet === null"
                        class="bg-green-700 text-white font-bold py-4 px-6 rounded-lg w-full text-center transition hover:bg-green-800
                                disabled:opacity-50 disabled:cursor-not-allowed">
                        Lanjutkan
                    </button>
                </form>
            </div>

        </div>
    @endsection
