@section('hide_main_header', true)
@section('remove_main_padding', true)

@extends('layout.main')

@section('title', 'Proses Pembayaran - Cyber Cafe')

@section('content')
    <div class="bg-gray-100 min-h-screen">

        <header class="bg-green-600 text-white p-4 sticky top-0 z-10">
            <div class="max-w-xl mx-auto flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-xl">Cyber Cafe</h1>
                    <p class="text-sm opacity-90">Proses Pembayaran</p>
                </div>
                <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
            </div>
        </header>

        <form action="{{ route('pembayaran.konfirmasi') }}" method="POST">
            @csrf

            <input type="hidden" name="payment_method" value="{{ $payment_method }}">

            <div class="bg-white rounded-t-3xl shadow-lg m-5 min-h-screen relative pb-32">
                <div class="max-w-xl mx-auto p-6 space-y-6">

                    <h2 class="text-xl font-semibold text-center text-gray-800">Masukan Nama dan Nomor Meja</h2>

                    <div class="space-y-2">
                        <label for="nama_pelanggan" class="text-sm font-medium text-gray-700">Nama Anda</label>
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Contoh: Valen"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                        @error('nama_pelanggan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="nomor_meja" class="text-sm font-medium text-gray-700">Nomor Meja</label>
                        <input type="number" name="nomor_meja" id="nomor_meja" placeholder="Contoh: 3"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                        @error('nomor_meja')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-gray-700">Email Anda (Untuk Struk)</label>
                        <input type="email" name="email" id="email" placeholder="Contoh: valen@gmail.com"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                            required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="fixed bottom-0 left-0 right-0 bg-white p-5 border-t shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
                <div class="max-w-xl mx-auto">
                    <button type="submit"
                        class="bg-green-700 text-white font-bold py-4 px-6 rounded-lg w-full text-center transition hover:bg-green-800">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </div>

        </form>

    </div>
@endsection
