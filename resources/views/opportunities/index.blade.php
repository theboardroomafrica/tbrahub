<x-dash-layout>
    
    <x-title-bar title="Opportunities"/>

    <section>
        <div class="container">

            @if($matched)
                <div class="card2">
                    <h3 class="font-bold text-md">Matched opportunities</h3>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                        <x-opportunity-card :simple="true" :opportunity="$matched"/>
                    </div>
                </div>
            @else
                <div class="card2">
                    <h2>We couldn't identify any roles that align with your interests and expertise at this time</h2>
                    <div class="card max-w-80 mt-4">
                        <h2>Get better matches by updating your profile and preferences</h2>
                        <a href="{{ route('profile.index') }}" class="font-bold text-mustard-700 mt-2 inline-block"> →
                            UPDATE PROFILE</a>
                    </div>
                </div>
            @endif

            <div class="flex justify-between items-center mt-8">
                <h3 class="font-bold text-md">Featured opportunities</h3>

                <form class="max-w-3xl flex gap-4">
                    <div class="w-44">
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-tender-500 focus:border-tender-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-tender-500 dark:focus:border-tender-500">
                            <option selected>All opportunities</option>
                            <option value="1">Board Opportunities</option>
                            <option value="2">Executive Opportunities</option>
                            <option value="3">Other Opportunities</option>
                        </select>
                    </div>
                    <div class="w-44">
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-tender-500 focus:border-tender-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-tender-500 dark:focus:border-tender-500">
                            <option selected>All industries</option>
                            <option value="1">Board Opportunities</option>
                            <option value="2">Executive Opportunities</option>
                            <option value="3">Other Opportunities</option>
                        </select>
                    </div>
                    <div class="w-80">
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown"
                                   class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300 rounded-l-md focus:ring-tender-500"
                                   placeholder="Search Opportunities" required/>
                            <button type="submit"
                                    class="absolute top-0 end-0 py-2.5 px-3.5 text-sm font-medium h-full text-white bg-tender rounded-e-lg border border-tender hover:bg-tender-700">
                                <x-heroicon-o-magnifying-glass class="w-5 h-5" aria-hidden="true"/>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                @foreach($opportunities as $opportunity)
                    <x-opportunity-card :opportunity="$opportunity"/>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $opportunities->links() }}
            </div>
        </div>
    </section>
</x-dash-layout>
