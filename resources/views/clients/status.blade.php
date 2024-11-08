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
<body class="font-inter antialiased bg-gray-100 text-[#475569]">

<div class="bg-white">
    <div class="flex justify-center items-center min-h-screen">
        <div class="mx-auto max-w-2xl">
            <div class="text-center">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Thank You for Registering!
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    We appreciate you taking the time to register with us.
                    Your account is currently under review, and we’ll notify you as soon as it’s approved. If you have
                    any questions in the meantime, feel free to reach out.
                </p>
                @unless(Route::is('clients.submitted'))
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <form method="POST" action="{{ route('clients.destroy') }}">
                            @csrf
                            <button type="submit"
                                    class="rounded-md bg-gray-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Logout
                            </button>
                        </form>
                    </div>
                @endunless
            </div>
        </div>
    </div>
</div>


</body>
</html>
