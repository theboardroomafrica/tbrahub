<x-dash-layout>

    @section('hideTitle', true)

    <div class="container pt-16">
        <div class="grid grid-cols-1 gap-7 mx-auto max-w-6xl">
            <div class="border border-black/10 dark:border-white/10 p-5 !pb-14 rounded-md">
                <div x-data="{annual: false}" class="mt-5">
                    <div class="text-center mb-7 mt-8">
                        <h1 class="text-5xl font-semibold mb-2">Choose Your Plan</h1>
                        <p class="text-xs text-black/40 dark:text-white/40">Simple pricing. No hidden fees. Advanced
                            features for you business.</p>
                    </div>
                    <div class="flex max-w-[288px] p-1 mx-auto bg-black/5 dark:bg-white/5 rounded-xl mb-16">
                        <button
                            class="transition rounded-lg w-full block py-1 text-sm bg-black text-white dark:bg-white/10"
                            :class="annual == false ? 'bg-black text-white dark:bg-white/10' : 'text-black bg-transparent dark:text-white'"
                            @click="annual = false" type="button">Monthly
                        </button>
                        <button
                            class="transition rounded-lg w-full block py-1 text-sm text-black bg-transparent dark:text-white"
                            :class="annual == true ? 'bg-black text-white dark:bg-white/10' : 'text-black bg-transparent dark:text-white'"
                            @click="annual = true" type="button">Annual
                        </button>
                    </div>
                    <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 2xl:gap-7">
                        <div class="bg-lightpurple-100 dark:bg-white/5 rounded-2xl p-5 2xl:p-10">
                            <p class="px-1 text-lg font-semibold mb-6">PRO version</p>
                            <p class="text-5xl font-semibold mb-8">$<span class="mr-2"
                                                                          x-text="annual ? '109.9' : '9.9'">9.9</span><span
                                    class="text-sm font-normal text-black/40 dark:text-white/40"
                                    x-text="annual ? '/Year' : '/Month'">/Month</span></p>
                            <ul class="grid grid-cols-1 gap-1 text-sm leading-5 mb-8">
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Single user license
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Component properties
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Interactive components
                                </li>
                            </ul>
                            <button
                                class="bg-black text-white border border-black dark:bg-lightpurple-200 dark:text-black dark:border-lightpurple-200 hover:bg-transparent dark:hover:bg-transparent hover:text-black dark:hover:text-white font-semibold p-2.5 w-full text-center rounded-2xl text-lg transition-all duration-300">
                                Choose Plan
                            </button>
                        </div>
                        <div class="bg-lightpurple-200 dark:bg-white/10 rounded-2xl p-5 2xl:p-10">
                            <p class="px-1 text-lg font-semibold mb-6 ">PRO TEAM version</p>
                            <p class="text-5xl font-semibold mb-8">$<span class="mr-2"
                                                                          x-text="annual ? '229.9' : '19.9'">19.9</span><span
                                    class="text-sm font-normal text-black/40 dark:text-white/40"
                                    x-text="annual ? '/Year' : '/Month'">/Month</span></p>
                            <ul class="grid grid-cols-1 gap-1 text-sm leading-5 mb-8">
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Up to 5 users license
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Component properties
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Interactive components
                                </li>
                            </ul>
                            <button
                                class="bg-black text-white border border-black dark:bg-lightpurple-200 dark:text-black dark:border-lightpurple-200 hover:bg-transparent dark:hover:bg-transparent hover:text-black dark:hover:text-white font-semibold p-2.5 w-full text-center rounded-2xl text-lg transition-all duration-300">
                                Choose Plan
                            </button>
                        </div>
                        <div class="bg-lightblue-100 dark:bg-white/5 rounded-2xl p-5 2xl:p-10">
                            <p class="px-1 text-lg font-semibold mb-6">ENTERPRISE version</p>
                            <p class="text-5xl font-semibold mb-8">$<span class="mr-2"
                                                                          x-text="annual ? '349.9' : '29.9'">29.9</span><span
                                    class="text-sm font-normal text-black/40 dark:text-white/40"
                                    x-text="annual ? '/Year' : '/Month'">/Month</span></p>
                            <ul class="grid grid-cols-1 gap-1 text-sm leading-5 mb-8">
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Up to 12+ users license
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Component properties
                                </li>
                                <li class="flex items-center gap-x-2 py-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.03061 11.47L5.03033 11.4697C4.88968 11.329 4.69891 11.25 4.5 11.25C4.30109 11.25 4.11032 11.329 3.96967 11.4697C3.82902 11.6103 3.75 11.8011 3.75 12C3.75 12.012 3.75029 12.024 3.75087 12.036C3.75982 12.2223 3.83783 12.3985 3.96967 12.5303L3.96995 12.5306L9.21967 17.7803C9.51256 18.0732 9.98744 18.0732 10.2803 17.7803L20.7803 7.28033C20.921 7.13968 21 6.94891 21 6.75C21 6.55109 20.921 6.36032 20.7803 6.21967C20.6397 6.07902 20.4489 6 20.25 6C20.0511 6 19.8603 6.07902 19.7197 6.21967L9.75 16.1893L5.03061 11.47Z"
                                            fill="currentcolor"></path>
                                    </svg>
                                    Interactive components
                                </li>
                            </ul>
                            <button
                                class="bg-black text-white border border-black dark:bg-lightpurple-200 dark:text-black dark:border-lightpurple-200 hover:bg-transparent dark:hover:bg-transparent hover:text-black dark:hover:text-white font-semibold p-2.5 w-full text-center rounded-2xl text-lg transition-all duration-300">
                                Choose Plan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>
