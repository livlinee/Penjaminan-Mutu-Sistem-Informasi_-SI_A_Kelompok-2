<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Tambahkan mentor disini</h2>
                    <a href="{{ route('admin.mentor.index') }}" class="text-sm text-blue-600 hover:underline">
                        &larr; Kembali ke daftar mentor
                    </a>
                </div>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.mentor.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_mentor" class="block text-sm font-medium text-gray-700">Nama mentor</label>
                            <input type="text" name="nama_mentor" id="nama_mentor" value="{{ old('nama_mentor') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="materi" class="block text-sm font-medium text-gray-700">Materi yang
                                diajarkan</label>
                            <input type="text" name="materi" id="materi" value="{{ old('materi') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="jadwal_dan_waktu" class="block text-sm font-medium text-gray-700">Jadwal
                                mentoring</label>
                            <input type="text" name="jadwal_dan_waktu" id="jadwal_dan_waktu"
                                value="{{ old('jadwal_dan_waktu') }}" placeholder="Contoh: Senin, 09.00-11.00"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
                            <input type="text" name="kontak" id="kontak" value="{{ old('kontak') }}"
                                placeholder="Contoh: 08123..."
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Upload foto</label>
                        <input type="file" name="gambar" id="gambar"
                            class="mt-1 block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-md file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100">
                    </div>

                    <div class="text-right pt-4">
                        <button type="submit"
                            class="bg-blue-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-blue-700">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
