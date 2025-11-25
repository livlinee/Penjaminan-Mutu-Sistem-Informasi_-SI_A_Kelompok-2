<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Script Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Script Alpine.js (untuk show/hide password) --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="font-sans text-gray-900 antialiased">

    {{-- Container Utama (Latar belakang gelap) --}}
    <div class="min-h-screen flex justify-center items-center sm:pt-0 bg-slate-900 relative">

        {{-- Logo di pojok kiri atas --}}
        <div class="absolute top-6 left-6">
            <img src="/images/LOGO.png" alt="Logo Cyber Cafe" class="w-20 h-20 object-contain rounded-full">
        </div>

        <div class="w-full sm:max-w-sm mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
