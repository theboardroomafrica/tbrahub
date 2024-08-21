<section>
    <div class="container flex justify-between items-center py-4">
        <img src="{{ URL::asset('images/logo.svg') }}" class="w-20 md:w-32"/>
        <div class="md:flex items-center gap-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
            <a href="{{ route('profile.index') }}" class="font-bold -md:pb-1 -md:text-right">View profile</a>
            <div class="flex gap-2">
                <a href="#">
                    <x-heroicon-o-bell-alert
                        class="h-8 w-8 text-tender border border-tender rounded-full p-1 hover:bg-tender hover:text-white"/>
                </a>
                <a href="#">
                    <x-heroicon-o-cog-6-tooth
                        class="h-8 w-8 text-tender border border-tender rounded-full p-1 hover:bg-tender hover:text-white"/>
                </a>
                <a href="#"><img src="https://placehold.co/200x200" class="h-8 w-8 rounded-full"/></a>
            </div>
        </div>
    </div>
</section>

<section class="bg-darkblue">
    <div class="container flex justify-between items-center">
        <div class="flex gap-6">
            @foreach(["Home", "Network", "Membership Services", "Board Opportunities", "Events", "Resources", "News & Articles", "FAQs"] as $title)
                <a href="#" class="text-white">{{ $title }}</a>
            @endforeach
        </div>
        <a href="#" class="text-white font-bold bg-mustard-600 py-4 px-4">Upgrade to Prime</a>
    </div>
</section>
