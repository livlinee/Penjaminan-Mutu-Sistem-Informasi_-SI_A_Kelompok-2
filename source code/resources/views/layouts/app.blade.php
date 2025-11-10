<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Kita gunakan Tailwind CDN (seperti di layout login Anda) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Font Awesome (Opsional, untuk ikon) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="font-sans antialiased">
    {{-- Latar belakang abu-abu muda seperti di gambar --}}
    <div class="min-h-screen bg-gray-100">

        {{-- Panggil file navigasi --}}
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
