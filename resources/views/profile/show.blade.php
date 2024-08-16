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
<section class="container cv my-16">

    @if($actions)
        <div class="mx-auto text-center flex items-center gap-4 justify-center">
            <p class="whitespace-nowrap mb-2">Copy and share link</p>
            <div class="relative mb-4 w-full mt-2 max-w-lg">
                <input id="api-key" type="text"
                       class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-12 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ route('profile.show', $user->id) }}" disabled
                       readonly/>
                <button onclick="copyToClipboard()" id="copy-url"
                        data-copy-to-clipboard-target="api-key"
                        data-tooltip-target="tooltip-api-key"
                        class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                    <span id="default-icon-api-key">
                                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor"
                                             viewBox="0 0 18 20">
                                            <path
                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                    </span>
                    <span id="success-icon-api-key" class="hidden inline-flex items-center">
                                        <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </span>
                </button>
                <div id="tooltip-api-key" role="tooltip"
                     class="invisible opacity-0 absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm -top-[50px] right-0 tooltip dark:bg-gray-700">
                    <span id="default-tooltip-message-api-key">Copy to clipboard</span>
                    <span id="success-tooltip-message-api-key">Copied!</span>
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    @endif

    <div class="border border-gray-300 bg-white">
        <div class="p-12 bg-[#F3F7FA] flex justify-between items-center">
            <div class="flex gap-8 items-center">
                <img src="https://placehold.co/100" class="rounded-full">
                <div>
                    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                    <p class="text-xl">Experienced Financial Industry Leader</p>
                </div>
            </div>
            <div class="contact-details text-right">
                {{-- <a href="#" class="btn btn-mustard ml-auto inline-block">Connect with me</a> --}}
                <p>{{ fake()->e164PhoneNumber() }}</p>
                <p>{{ fake()->companyEmail() }}</p>
                <p>{{ fake()->city }}, {{ fake()->country() }}</p>
                <a href="{{ $user->linkedin }}" class="mt-4 font-bold text-sm text-blue-500 inline-block">LinkedIn
                    Profile</a>
            </div>
        </div>
        <div class="p-12">
            <div class="profile-intro">
                <h2>Profile summary</h2>
                <p class="intro mt-4">{{ $user->bio }}</p>
            </div>

            <div class="content-grid grid grid-cols-[2fr_1fr] mt-12 gap-16">
                <div class="cv-main">
                    <livewire:experience-manager :title="'Professional Experience'" :user="$user" :actions="$actions"
                                                 :model="'professional'"/>
                    <div class="mt-10">
                        <livewire:experience-manager :user="$user" :actions="$actions" :model="'board'"
                                                     :title="'Board Experience'"/>
                    </div>
                </div>
                <div class="cv-sidebar">
                    <div class="side-category">
                        <livewire:experience-manager :title="'Achievement'" :user="$user" :actions="$actions"
                                                     :model="'achievement'"/>
                    </div>

                    <div class="side-category">
                        <h2 class="mb-2">Board Skills</h2>
                        <div class="mt-4">
                            <ul class="mt-4 list-disc">
                                @foreach(range(1, 4) as $catItem)
                                    <li>{{ fake()->sentence(6) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="side-category">
                        <h2 class="mb-2">Recognitions</h2>
                        <div class="mt-4">
                            <ul class="mt-4 list-disc">
                                @foreach($user->recognitions as $recognition)
                                    <li><b>{{ $recognition->award }}</b>, {{ $recognition->organization }}
                                        , {{ $recognition->year }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="side-category">
                        <h2 class="mb-2">TBrA Certificates</h2>
                        <div class="mt-4 flex gap-4">
                            <a class="bg-mustard-200 text-mustard-700 px-4 py-2 font-medium">-> Open Doors</a>
                            <a class="bg-tender-200 text-tender-700 px-4 py-2 font-medium">-> ESG Certificate</a>
                        </div>
                    </div>

                    <div class="side-category">
                        <livewire:experience-manager :title="'Languages'" :user="$user" :actions="$actions"
                                                     :model="'language'"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <p class="font-bold mt-8 text-center">Powered by TheBoardroom Africa</p>
</section>

<script>
    function copyToClipboard() {
        const inputElement = document.getElementById('api-key');

        // Copy the input value to the clipboard
        navigator.clipboard.writeText(inputElement.value).then(() => {
            // On success, show the success icon and tooltip
            document.getElementById('default-icon-api-key').classList.add('hidden');
            document.getElementById('success-icon-api-key').classList.remove('hidden');
            document.getElementById('default-tooltip-message-api-key').classList.add('hidden');
            document.getElementById('success-tooltip-message-api-key').classList.remove('hidden');

            // Optionally, hide the tooltip after a delay
            setTimeout(() => {
                document.getElementById('default-icon-api-key').classList.remove('hidden');
                document.getElementById('success-icon-api-key').classList.add('hidden');
                document.getElementById('default-tooltip-message-api-key').classList.remove('hidden');
                document.getElementById('success-tooltip-message-api-key').classList.add('hidden');
            }, 2000); // Adjust the timeout as needed
        }).catch(err => {
            // On error, you might want to handle it (e.g., show an error message)
            console.error('Failed to copy text: ', err);
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('copy-url');
        const tooltip = document.getElementById('tooltip-api-key');

        button.addEventListener('mouseenter', () => {
            tooltip.classList.remove('invisible', 'opacity-0');
            tooltip.classList.add('opacity-100', 'visible');
        });

        button.addEventListener('mouseleave', () => {
            tooltip.classList.add('invisible', 'opacity-0');
            tooltip.classList.remove('opacity-100', 'visible');
        });
    });
</script>
</body>
</html>
