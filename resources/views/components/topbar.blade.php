<nav
    class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-30 h-16">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <div
                class="mr-3 cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                @click="toggleSidebar = !toggleSidebar"
            >
                <span class="sr-only">Toggle sidebar</span>
                <div class="lg:hidden">
                    <x-heroicon-o-bars-3-center-left class="w-6 h-6"/>
                </div>
                <div class="hidden lg:block">
                    <x-heroicon-o-bars-3-center-left class="w-6 h-6"/>
                </div>
            </div>
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
                <img src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1734097957/marcia_uvkeft.jpg"
                     alt="Member Image" class="h-8 w-8 rounded-full">
            </a>
        </div>
    </div>
</nav>
