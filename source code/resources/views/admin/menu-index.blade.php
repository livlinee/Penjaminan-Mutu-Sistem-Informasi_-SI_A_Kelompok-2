{{-- Kita gunakan layout admin ('app') --}}
<x-app-layout>
    {{-- Ini adalah header halaman (Manajemen Menu) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Tombol Tambah (Diarahkan ke route 'create') --}}
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Kelola Mentor</h2>
                <a href="{{ route('admin.mentor.create') }}"
                    class="bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700">
                    + Tambah Menu Baru
                </a>
            </div>

            {{-- Grid Card Menu (sesuai gambar) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">

                {{-- Loop data menu dari controller --}}
                @foreach ($menus as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border">
                        {{-- GANTI: Bungkus gambar dengan div.relative untuk menampung rating --}}
                        <div class="relative">
                            {{-- Path gambar menu --}}
                            <img src="{{ asset('images/' . $item->gambar_menu) }}" alt="{{ $item->nama_menu }}"
                                class="w-full h-40 object-cover">

                            {{-- TAMBAHKAN INI: Badge Rating --}}
                            <div
                                class="absolute top-2 left-2 bg-black/50 backdrop-blur-sm text-white text-xs font-bold px-2 py-1 rounded-full flex items-center gap-1">
                                {{-- Ikon Bintang --}}
                                <svg class="w-3 h-3 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                {{-- Format rating menjadi 1 angka desimal (cth: 4.8) --}}
                                <span>{{ number_format($item->rate_menu, 1) }}</span>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="text-md font-semibold">{{ $item->nama_menu }}</h3>
                            <p class="text-sm text-gray-500">Cyber Caffe {{ $item->kategori }}</p>
                            <p class="text-sm font-bold text-gray-800 mt-1">Rp.
                                {{ number_format($item->harga, 0, ',', '.') }}</p>

                            {{-- Tombol Aksi (Diarahkan ke route 'edit' dan 'destroy') --}}
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('admin.menu.edit', $item->id_menu) }}"
                                    class="bg-blue-500 text-white px-3 py-1 text-sm rounded-md hover:bg-blue-600 w-full text-center">Edit</a>

                                {{-- Form Hapus --}}
                                <form action="{{ route('admin.menu.destroy', $item->id_menu) }}" method="POST"
                                    class="w-full" onsubmit="return confirm('Anda yakin ingin menghapus menu ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 text-sm rounded-md hover:bg-red-600 w-full">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
