@extends('layout.main')

@section('title', 'Minuman - Cyber Cafe')

@section('content')
    <section class="space-y-8" x-data="{ open: false, selectedItem: {} }">
        <h3 class="font-semibold text-lg mb-3">Minuman</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

            @foreach ($minuman as $item)
                <div class="bg-white p-3 rounded-2xl shadow hover:shadow-lg transition"
                    x-show="searchQuery === '' || '{{ strtolower($item->nama_menu) }}'.includes(searchQuery.toLowerCase())"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">

                    <a href="{{ route('minuman.detail', $item->id_menu) }}" class="space-y-2 block">

                        <img src="{{ asset('images/' . $item->gambar_menu) }}" class="rounded-xl w-full h-36 object-cover">

                        <h4 class="font-semibold mt-2">{{ $item->nama_menu }}</h4>

                        <p class="text-sm text-gray-500">Cyber Caffe {{ $item->kategori }}</p>
                    </a>

                    <div class="flex justify-between items-center mt-2">

                        <span class="font-semibold">Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>

                        <button type="button"
                            @click="open = true; selectedItem = { 
                                id: {{ $item->id_menu }},
                                name: '{{ $item->nama_menu }}', 
                                price: {{ $item->harga }}, 
                                image: '{{ asset('images/' . $item->gambar_menu) }}' 
                            }"
                            class="bg-green-600 text-white rounded-full w-8 h-8 flex justify-center text-lg">+</button>
                    </div>
                </div>
            @endforeach

        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

            <div @click="open = false" class="fixed inset-0 bg-black/50"></div>

            <div x-data="{ quantity: 1 }" @click.outside="open = false"
                class="relative bg-white rounded-2xl shadow-lg p-6 w-full max-w-sm">

                <form action="{{ route('keranjang.tambah') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="id_menu" x-bind:value="selectedItem.id">
                    <input type="hidden" name="quantity" x-model="quantity">

                    <h3 class="text-xl font-semibold text-center">Pesanan</h3>
                    <p class="text-center text-gray-500 text-sm">Tolong masukan jumlah total orderan yang ingin kamu pesan
                    </p>

                    <div>
                        <div class="flex justify-between items-baseline mb-2">
                            <label class="text-sm font-medium text-gray-700">Berapa Banyak?</label>
                            <span class="font-semibold text-gray-900"
                                x-text="new Intl.NumberFormat('id-ID', { 
                                style: 'currency', 
                                currency: 'IDR', 
                                minimumFractionDigits: 0 
                            }).format(quantity * selectedItem.price)">
                            </span>
                        </div>

                        <div class="flex items-center justify-between bg-gray-100 rounded-full p-2">
                            <button type="button" @click="if (quantity > 1) quantity--"
                                class="bg-white text-gray-700 rounded-full w-10 h-10 flex items-center justify-center text-xl font-bold shadow">-</button>


                            <span x-text="quantity" class="font-bold text-lg px-4">1</span>

                            <button type="button" @click="quantity++"
                                class="bg-white text-gray-700 rounded-full w-10 h-10 flex items-center justify-center text-xl font-bold shadow">+</button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 pt-2">
                        <button type="submit"
                            class="bg-green-600 text-white px-5 py-3 rounded-full font-medium shadow hover:bg-green-700">
                            Tambahkan ke keranjang
                        </button>
                        <button type="button" @click="open = false" class="text-gray-600 font-medium py-2">
                            Kembali ke Beranda
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
