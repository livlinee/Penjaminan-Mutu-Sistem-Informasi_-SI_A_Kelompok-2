<x-app-layout>
    {{-- 
      ===============================================
      BAGIAN 1: HERO SECTION
      ===============================================
    --}}
    <div class="relative text-white overflow-hidden">
        {{-- Latar Belakang --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop"
                alt="Cafe background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-60"></div>
        </div>

        {{-- Konten Teks dan Gambar Wanita --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                {{-- Kiri: Teks Sambutan --}}
                <div class="lg:pr-16">
                    <h1 class="text-4xl sm:text-5xl font-bold mb-4">
                        Hi, {{ session('admin_nama', 'Admin') }}
                    </h1>
                    <p class="text-lg text-gray-300">
                        Selamat datang di Dashboard Admin Cyber Cafe.
                        Kelola data pelanggan, pantau aktivitas, dan pastikan layanan berjalan dengan optimal.
                    </p>
                </div>

                {{-- Kanan: Gambar Wanita (Ganti src dengan gambar transparan Anda) --}}
                <div class="hidden lg:block h-[400px] relative">
                    <img src="{{ asset('images/mentors/Nur.png') }}" alt="Admin"
                        class="absolute bottom-0 right-0 h-[110%] w-auto object-contain">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
