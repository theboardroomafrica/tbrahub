<aside
    class="fixed top-0 left-0 z-40 h-screen pt-14 -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 ease-in-out"
    :class="toggleSidebar ? 'w-16' : 'w-64'"
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
        class="absolute bottom-0 left-0 justify-center p-4 gap-2 w-full bg-white dark:bg-gray-800 z-20"
        :class="toggleSidebar ? 'flex flex-col items-center' : 'lg:flex'"
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
