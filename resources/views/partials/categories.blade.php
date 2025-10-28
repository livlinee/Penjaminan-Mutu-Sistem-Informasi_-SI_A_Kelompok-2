<div class="flex justify-center gap-3 mt-6">
    <a href="{{ route('makanan') }}" @class([
        'px-5 py-2 rounded-full font-medium shadow',
        'bg-green-600 text-white hover:bg-green-700' => request()->routeIs(
            'makanan'),
        'bg-white text-green-600 border border-green-500 hover:bg-green-100' => !request()->routeIs(
            'makanan'),
    ])>
        Makanan
    </a>

    <a href="{{ route('minuman') }}" @class([
        'px-5 py-2 rounded-full font-medium shadow',
        'bg-green-600 text-white hover:bg-green-700' => request()->routeIs(
            'minuman'),
        'bg-white text-green-600 border border-green-500 hover:bg-green-100' => !request()->routeIs(
            'minuman'),
    ])>
        Minuman
    </a>
</div>
