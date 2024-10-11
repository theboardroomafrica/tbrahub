<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/noalpine.js'])
    @filamentScripts
</head>
<body class="font-inter antialiased bg-gray-50 text-[#475569]">
<div class="grid xl:grid-cols-[2fr_5fr] h-screen register-client">
    <section
        class="hidden xl:flex bg-[url('https://res.cloudinary.com/dhhw72iwq/image/upload/v1726060356/ClientRegisterBg_vzzbek.jpg')] bg-cover">

    </section>

    <section class="py-16 px-16 xl:px-32">
        <h3 class="font-bold font-libre text-3xl text-tender">Find your next great <br> board member or executive.</h3>
        <p class="mt-4">Connect with our curated community of diverse board directors, C-suite members, and rising
            executives:</p>
        <hr class="my-6 bg-tender"/>
        <livewire:register-client/>
    </section>
</div>
</body>
</html>
