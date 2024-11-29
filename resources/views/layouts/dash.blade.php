<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-sm">
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="antialiased" x-data="{toggleSidebar:false}">
        <x-topbar/>

        <x-sidebar/>

        <main class="mt-16" :class="toggleSidebar ? '' : 'md:ml-64'">
            {{ $slot }}
        </main>
        <br><br>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const drawerNavigation = document.getElementById('drawer-navigation');
        const links = drawerNavigation.querySelectorAll('a');
        const currentPath = window.location.pathname;

        links.forEach(link => {
            const href = link.getAttribute('href');

            if (!href || href === '#') return;

            const linkPath = new URL(link.href).pathname;
            if (currentPath.startsWith(linkPath + '/') || currentPath === linkPath) {
                link.classList.add('bg-gray-200', 'dark:bg-gray-700', 'font-bold');
            } else {
                link.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'font-bold');
            }
        });
    });
</script>
</body>
</html>
