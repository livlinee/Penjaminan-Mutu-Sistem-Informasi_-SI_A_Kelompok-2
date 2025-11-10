@section('hide_main_header', true)
@section('remove_main_padding', true)

@extends('layout.main')

@section('title', 'Pembayaran Berhasil - Cyber Cafe')

@section('content')
    <div class="bg-white min-h-screen flex flex-col justify-center items-center text-center p-6">

        <div class="max-w-sm">
            <svg class="w-24 h-24 text-green-600 mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"
                    fill="currentColor" />
            </svg>

            <h1 class="text-2xl font-bold text-gray-800 mt-6">
                Selamat, Orderan kamu sedang dibuat, mohon tunggu..
            </h1>
            <p class="text-gray-500 mt-2">
                Terimakasih telah datang di Cyber Cafe
            </p>

            <div class="mt-10 flex flex-col gap-3">

                <a href="{{ route('struk.show', $order_group_id) }}"
                    class="bg-green-700 text-white font-semibold py-4 px-6 rounded-lg w-full text-center transition hover:bg-green-800 shadow-lg">
                    Lihat Struk Pembelian
                </a>

                <a href="{{ route('makanan') }}" class="font-medium text-gray-600 underline hover:text-green-700">
                    Kembali Ke Beranda
                </a>
            </div>
        </div>

    </div>
@endsection
