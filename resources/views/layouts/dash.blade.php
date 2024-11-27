<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-sm">
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Page Content -->
    <div class="antialiased">
        <nav
            class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50 h-16">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <button
                        data-drawer-target="drawer-navigation"
                        data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            aria-hidden="true"
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="{{ route("dashboard") }}" class="flex items-center justify-between mr-4">
                        <img src="{{ URL::asset('images/logo.svg') }}" alt="TBrA Logo" class="w-20"/>
                    </a>
                </div>
                <div class="flex gap-1 items-center">
                    <a href="{{ route('profile.index') }}" class="mr-6 flex items-center gap-1 btn btn-transparent">
                        <x-heroicon-o-arrow-path-rounded-square class="w-6 h-6"/>
                        Refer a friend
                    </a>
                    <a href="{{ route('profile.index') }}" class="btn btn-dark flex items-center font-normal mr-6">Upgrade</a>
                    <a href="#" class=" mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100">
                        <x-heroicon-o-bell-alert class="h-10 w-10 p-2"/>
                    </a>
                    <a href="#">
                        <img src="https://placehold.co/200x200" alt="Member Image" class="h-8 w-8 rounded-full">
                    </a>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->

        <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidenav"
            id="drawer-navigation"
        >
            <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                <ul class="pt-5 space-y-2">
                    <x-menu-item title="Dashboard" route="{{ route('dashboard') }}" icon="home"/>
                    <x-menu-item title="Opportunities" route="{{ route('opportunities.index') }}" icon="briefcase"/>
                    <x-menu-item title="Professional Support" route="#" icon="user-group"/>
                    <x-menu-item title="Connections" route="{{ route('connections.index') }}" icon="paper-airplane"/>
                    <x-menu-item title="Events" route="#" icon="calendar"/>
                    <x-menu-item title="Resources" route="#" icon="folder"/>
                    <x-menu-item title="FAQs" route="#" icon="question-mark-circle"/>
                </ul>
            </div>
            <div
                class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20"
            >
                <a
                    href="#"
                    class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100"
                >
                    <x-heroicon-o-adjustments-vertical class="h-6 w-6"/>
                </a>
                <a
                    href="#"
                    data-tooltip-target="tooltip-settings"
                    class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100"
                >
                    <x-heroicon-o-cog-8-tooth class="h-6 w-6"/>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{route('logout')}}"
                       title="Logout"
                       class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100"
                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <x-heroicon-s-power class="h-6 w-6"/>
                    </a>
                </form>
            </div>
        </aside>
        @unless (view()->hasSection('hideTitle'))
            <section class="md:ml-64 mt-16">
                <div class="container">
                    <div class="flex items-center justify-between py-6">
                        <h2 class="text-3xl font-semibold text-dark font-libre">@yield('title')</h2>

                        <div class="flex">
                            <a href="#" class="btn btn-white flex gap-2 items-center">
                                <x-heroicon-o-sparkles class="h-6 w-6"/>
                                Create a cover letter</a>
                        </div>
                    </div>
                </div>
            </section>
        @endunless
        <main class="md:ml-64">
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
