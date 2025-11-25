<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Menu Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        {{-- DIUBAH: Dibuat lebih ramping (max-w-4xl) karena tidak ada gambar --}}
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Form Tambah Menu</h3>
                    <a href="{{ route('admin.menu.index') }}" class="text-sm text-blue-600 hover:underline">
                        &larr; Kembali ke daftar menu
                    </a>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- DIHAPUS: Grid layout dan gambar kiri --}}
                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div>
                        <label for="nama_menu" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan
                            </option>
                            <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman
                            </option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp.)</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                                placeholder="Contoh: 50000"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label for="rate_menu" class="block text-sm font-medium text-gray-700">Rating Awal
                                (0-5)</label>
                            <input type="number" name="rate_menu" id="rate_menu" value="{{ old('rate_menu', 0) }}"
                                step="0.1" min="0" max="5"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="deskripsi_menu" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi_menu" id="deskripsi_menu" rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>{{ old('deskripsi_menu') }}</textarea>
                    </div>

                    <div>
                        <label for="gambar_menu" class="block text-sm font-medium text-gray-700">Upload Gambar
                            Menu</label>
                        <input type="file" name="gambar_menu" id="gambar_menu"
                            class="mt-1 block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-md file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('admin.menu.index') }}"
                            class="bg-gray-500 text-white font-medium py-2 px-6 rounded-lg hover:bg-gray-600">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-blue-700">
                            Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
