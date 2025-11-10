<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- 1. Judul dan Tombol Tambah --}}
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Kelola Mentor</h2>
                <a href="{{ route('admin.mentor.create') }}"
                    class="bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700">
                    + Tambah Mentor Baru
                </a>
            </div>

            {{-- 2. Grid Card Mentor --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($mentors as $mentor)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/mentors/' . $mentor->gambar) }}" alt="{{ $mentor->nama_mentor }}"
                            class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold">{{ $mentor->nama_mentor }}</h3>
                            <p class="text-sm text-gray-600">{{ $mentor->materi }}</p>
                            <div class="text-sm text-gray-500 mt-2">
                                <p><strong>Jadwal:</strong> {{ $mentor->jadwal_dan_waktu }}</p>
                                <p><strong>Kontak:</strong> {{ $mentor->kontak }}</p>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('admin.mentor.edit', $mentor->id_mentor) }}"
                                    class="bg-blue-500 text-white px-3 py-1 text-sm rounded-md hover:bg-blue-600">Edit</a>
                                <form action="{{ route('admin.mentor.destroy', $mentor->id_mentor) }}" method="POST"
                                    onsubmit="return confirm('Anda yakin ingin menghapus mentor ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 text-sm rounded-md hover:bg-red-600">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- CARD "TAMBAH MENTOR" --}}
                <div
                    class="bg-white rounded-lg shadow-lg flex items-center justify-center min-h-[300px] border-2 border-dashed border-gray-300">

                    {{-- DIUBAH: <button> menjadi <a> --}}
                    <a href="{{ route('admin.mentor.create') }}" class="text-center text-gray-500 hover:text-blue-600">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Mentor
                    </a>
                </div>
            </div>

            {{-- Form "Tambahkan mentor disini" sudah dipindah ke halaman 'mentor-create' --}}

        </div>
    </div>
</x-app-layout>
