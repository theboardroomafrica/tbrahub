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

<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-6xl px-4 my-16">
        @php
            $pricing = [
                "foundation" => [
                    "One month premium access to our database of vetted executives",
                    "Single search",
                    "One license",
                    "25 candidate introductions"
               ],
               "growth" => [
                   "6 months premium access to our database of vetted executives",
                   "Unlimited roles",
                   "5 licenses",
                   "Advanced pipeline management",
                   "100 candidate introductions per month"
               ],
               "custom" => [
                   "End-to-end project management",
                   "Dedicated talent team",
                   "Advanced candidate screening",
                   "Unlimited candidate introductions",
                   "Advanced pipeline management"
               ]
            ];
        @endphp
        <h3 class="text-5xl font-libre text-center">Select your package</h3>
        <p class="mt-4 text-center mx-auto max-w-4xl">Our flexible plans are designed to meet the diverse needs of
            companies
            and
            organizations
            of all sizes. Whether you're an early-stage company, a growing enterprise, or an established corporation, we
            have a plan
            tailored to support your board and executive search requirements.</p>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch -mx-4 mt-8">
            <div class="flex w-full mb-8 lg:mb-0">
                <div class="flex flex-col p-6 space-y-6 rounded shadow sm:p-8 bg-gray-50 ">
                    <div class="space-y-2 text-center">
                        <h4 class="text-lg font-bold inline-block bg-gray-200 px-4 py-2 rounded mb-4">
                            Foundation</h4>
                        <div class="flex items-center gap-2 justify-center"><p class="self-start">$</p><span
                                class="text-6xl font-bold">2,500</span>
                            {{-- <p class="text-left">per <br/>month</p>--}}
                        </div>
                    </div>
                    <ul class="flex-1 mb-6">
                        @foreach($pricing["foundation"] as $option)
                            <li class="flex mb-2 gap-4">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                     class="text-lg shrink-0 mt-[5px]" height="1em" width="1em"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                </svg>
                                <span>{{ $option }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a class="inline-block px-5 py-3 font-semibold tracking-wider text-center rounded bg-tender text-gray-50"
                       href="{{ route('payment.index', ["amount" => 2500]) }}">Get Started</a></div>
            </div>
            <div class="flex w-full mb-8 lg:mb-0">
                <div class="flex flex-col p-6 space-y-6 rounded shadow sm:p-8 bg-tender text-gray-50 ">
                    <div class="space-y-2 text-center">
                        <h4 class="text-lg font-bold inline-block bg-gray-200 px-4 py-2 rounded mb-4 text-gray-800">
                            Growth</h4>
                        <div class="flex items-center gap-2 justify-center"><p class="self-start">$</p><span
                                class="text-6xl font-bold">10,000</span>
                        </div>
                    </div>
                    <ul class="flex-1 mb-6">
                        @foreach($pricing["growth"] as $option)
                            <li class="flex mb-2 gap-4">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                     class="text-lg shrink-0 mt-[5px]" height="1em" width="1em"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                </svg>
                                <span>{{ $option }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a class="inline-block px-5 py-3 font-semibold tracking-wider text-center rounded bg-white text-tender"
                       href="{{ route('payment.index', ["amount" => 10000]) }}">Get Started</a></div>
            </div>
            <div class="flex w-full mb-8 lg:mb-0">
                <div class="flex flex-col p-6 space-y-6 rounded shadow sm:p-8 bg-gray-50 ">
                    <div class="space-y-2 text-center">
                        <h4 class="text-lg font-bold inline-block bg-gray-200 px-4 py-2 rounded mb-4">
                            Premium</h4>
                        <div class="flex items-center gap-2 justify-center"><span
                                class="text-6xl font-bold">Custom</span>
                        </div>
                    </div>
                    <ul class="flex-1 mb-6">
                        @foreach($pricing["custom"] as $option)
                            <li class="flex mb-2 gap-4">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                     class="text-lg shrink-0 mt-[5px]" height="1em" width="1em"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                </svg>
                                <span>{{ $option }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a class="inline-block px-5 py-3 font-semibold tracking-wider text-center rounded bg-tender text-gray-50"
                       href="{{ route('clients.pay') }}">Get Started</a></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
