<header class="bg-green-600 text-white rounded-b-3xl shadow-md pb-6">
    <div class="flex justify-between items-center px-4 pt-4">
        <div class="flex items-center space-x-2">
            <div>
                <h1 class="font-bold text-lg leading-tight">Cyber Cafe</h1>
                <p class="text-sm text-white/80">Home</p>
            </div>
        </div>
        <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
    </div>

    <div class="mt-4 px-4">
        <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-3 text-gray-400"></i>
            <input type="text" placeholder="Cari makanan atau minuman..." x-model.debounce.300ms="searchQuery"
                class="w-full pl-10 pr-4 py-2 rounded-xl border-none focus:ring-2 focus:ring-green-300 text-gray-700" />
        </div>
    </div>

    <div class="mt-5 px-4">
        @if ($featuredMentor)
            <div class="relative bg-slate-900 text-white rounded-2xl shadow-lg h-40 overflow-hidden">

                <div class="absolute left-0 top-0 h-full w-2/3 p-5 flex flex-col justify-center space-y-1">
                    <p class="text-sm opacity-70">{{ $featuredMentor->jadwal_dan_waktu }}</p>
                    <h2 class="text-xl font-bold">Cyber Class Event</h2>
                    <p class="font-semibold text-amber-500 pt-2">Mentor oleh</p>
                    <span class="font-semibold text-amber-500">{{ $featuredMentor->nama_mentor }}</span>
                </div>

                <div class="absolute bottom-0 right-0 h-full w-1/2">

                    <img src="{{ asset('images/' . $featuredMentor->gambar) }}" alt="{{ $featuredMentor->nama_mentor }}"
                        class="absolute bottom-0 right-5 h-[110%] w-auto object-contain">
                </div>
            </div>
        @endif
    </div>
</header>
