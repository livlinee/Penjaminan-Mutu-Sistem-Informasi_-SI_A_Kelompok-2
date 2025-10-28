{{-- Halaman ini tidak pakai header & padding standar --}}
@section('hide_main_header', true)
@section('remove_main_padding', true)

@extends('layout.main')

@section('title', 'Struk Pembelian - ' . $struk->order_group_id)

@section('content')
    <div class="bg-green-600 min-h-screen p-4 flex flex-col items-center">

        <h1 class="text-3xl font-bold text-white pt-8 pb-4">Cyber Cafe</h1>

        <div class="bg-white rounded-3xl shadow-lg w-full max-w-sm overflow-hidden"
            style="
                background-image:
                    radial-gradient(circle at 0 50%, transparent 10px, white 10.5px),
                    radial-gradient(circle at 100% 50%, transparent 10px, white 10.5px);
                background-position: 0 68%, 100% 68%;
                background-size: 21px 21px;
                background-repeat: no-repeat;
             ">

            <div class="p-6">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/LOGO.png') }}" alt="Logo" class="w-16 h-16 rounded-xl">
                    <div>
                        <h2 class="text-xl font-bold">Cyber Cafe</h2>
                        <p class="text-sm text-gray-500">Jl. Tombolotutu, No. 15</p>
                    </div>
                </div>

                <div class="space-y-3 mt-6">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Tanggal order</span>
                        <span class="font-semibold">{{ $struk->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Waktu order</span>
                        <span class="font-semibold">{{ $struk->created_at->format('H.i \p\m') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total</span>
                        <span class="font-bold text-lg text-green-700">Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Metode Pembayaran</span>
                        <span class="font-semibold">{{ ucfirst($struk->opsi_pembayaran) }}</span>
                    </div>
                </div>

                <div class="bg-gray-100 rounded-lg p-3 text-center text-sm text-gray-600 mt-6">
                    Terimakasih telah datang untuk menikmati makanan dan minuman yang ada di cyber caffe..
                </div>
            </div>

            <div class="border-t-2 border-dashed border-gray-300 h-5" style="margin-top: 2rem; margin-bottom: 0.5rem;">
            </div>

            <div class="p-6 pt-0 flex flex-col items-center">
                <svg width="100%" height="80" x="0px" y="0px" viewBox="0 0 298 80" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="7" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="12" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="15" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="19" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="25" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="30" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="34" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="37" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="42" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="49" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="53" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="57" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="62" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="65" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="70" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="74" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="78" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="83" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="86" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="93" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="98" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="102" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="107" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="114" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="117" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="122" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="125" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="131" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="136" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="139" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="143" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="149" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="154" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="158" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="161" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="166" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="173" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="177" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="181" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="186" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="189" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="194" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="198" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="202" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="207" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="210" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="217" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="222" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="226" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="231" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="238" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="241" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="246" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="249" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="255" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="260" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="263" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="267" y="0" width="4" height="80" style="fill:#000000;" />
                    <rect x="273" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="278" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="282" y="0" width="1" height="80" style="fill:#000000;" />
                    <rect x="285" y="0" width="2" height="80" style="fill:#000000;" />
                    <rect x="290" y="0" width="4" height="80" style="fill:#000000;" />
                </svg>
                <p class="text-sm font-medium tracking-widest text-gray-700 mt-2">
                    Order ID: {{ $struk->order_group_id }}
                </p>
            </div>
        </div>

        <div class="fixed bottom-0 left-0 right-0 p-4">
            <a href="{{ route('makanan') }}"
                class="block w-full max-w-sm mx-auto bg-white text-green-700 font-semibold py-4 px-6 rounded-xl shadow-lg text-center transition hover:bg-gray-100">
                Kembali Ke Beranda
            </a>
        </div>

    </div>
@endsection
