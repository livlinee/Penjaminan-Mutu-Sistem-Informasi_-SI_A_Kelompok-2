<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cyber Cafe')</title>
    <link rel="stylesheet" href="icon/fontawesome/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800" x-data="{ searchQuery: '' }">

    {{-- HEADER --}}
    @unless (View::hasSection('hide_main_header'))
        @include('partials.header')
        @include('partials.categories')
    @endunless

    <main class="@if (!View::hasSection('remove_main_padding')) py-6 px-4 @endif">
        @yield('content')
    </main>
    @include('partials.cart-notification')
</body>

</html>
