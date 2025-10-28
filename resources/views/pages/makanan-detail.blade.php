@section('hide_main_header', true)

@section('remove_main_padding', true)

@extends('layout.main')

@section('title', $item->nama_menu . ' - Cyber Cafe')

@section('content')
    <div class="max-w-2xl mx-auto">
        <nav class="bg-green-600 text-white p-4 flex justify-between items-center sticky top-0 z-10 sm:rounded-b-lg">
            <a href="{{ route('makanan') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="font-semibold text-lg">Detail Menu</h1>
            <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
        </nav>

        <div class="relative">
            <img src="{{ asset('images/' . $item->gambar_menu) }}"
                class="w-full h-64 sm:h-80 object-cover sm:rounded-lg mt-4">
        </div>

        <div class="p-5 bg-white sm:rounded-lg space-y-5">

            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $item->nama_menu }}</h2>
                    <p class="text-gray-500">Cyber Caffe {{ $item->kategori }}</p>
                </div>


            </div>

            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="font-bold text-gray-800">{{ $item->rate_menu }}</span>
            </div>

            <hr class="border-gray-100">

            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-gray-800">Deskripsi</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ $item->deskripsi_menu }}
                </p>
            </div>
        </div>

        <div class="h-28"></div>
    </div>

    <div class="fixed bottom-0 left-0 right-0 bg-white p-4 shadow-[0_-2px_10px_rgba(0,0,0,0.1)]">
        <div class="max-w-2xl mx-auto">
            <form action="{{ route('keranjang.tambah') }}" method="POST" class="flex justify-between items-center">
                @csrf
                <input type="hidden" name="id_menu" value="{{ $item->id_menu }}">
                <input type="hidden" name="quantity" value="1">

                <div>
                    <p class="text-sm text-gray-500">Harga</p>
                    <p class="font-bold text-xl text-green-700">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>

                <button type="submit"
                    class="bg-green-600 text-white px-10 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                    Buy Now
                </button>
            </form>
        </div>
    </div>
@endsection
