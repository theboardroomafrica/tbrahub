<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-inter antialiased bg-gray-100 text-[#475569]">
<section class="container cv my-16">
    <div class="border border-gray-300 bg-white">
        <div class="p-12 bg-[#F3F7FA] flex justify-between items-center">
            <div class="flex gap-8 items-center">
                <img src="https://placehold.co/100" class="rounded-full">
                <div>
                    <h1 class="text-3xl font-bold">Charlotte Moses</h1>
                    <p class="text-xl">Experienced Financial Industry Leader</p>
                </div>
            </div>
            <div class="contact-details text-right">
                {{-- <a href="#" class="btn btn-mustard ml-auto inline-block">Connect with me</a> --}}
                <p>{{ fake()->e164PhoneNumber() }}</p>
                <p>{{ fake()->companyEmail() }}</p>
                <p>{{ fake()->city }}, {{ fake()->country() }}</p>
                <a href="#" class="mt-4 font-bold text-sm text-blue-500 inline-block">LinkedIn Profile</a>
            </div>
        </div>
        <div class="p-12">
            <div class="profile-intro">
                <h2>Profile summary</h2>
                <p class="intro mt-4">Dynamic and experienced Your Profession, e.g., executive, financial expert,
                    lawyer] with over X years] of comprehensive experience in [industry/field]. Proven track
                    record in strategic leadership, corporate governance, and financial oversight. Adept at
                    driving organizational growth, managing risk, and guiding strategic decisions. Seeking to
                    leverage expertise and insight as a member of the Board of Directors for
                    Company/Organization Name].</p>
            </div>

            <div class="content-grid grid grid-cols-[2fr_1fr] mt-12 gap-16">
                <div class="cv-main">
                    <div class="experience">
                        <h2>Professional Experience</h2>
                        @foreach(range(1, 2) as $experience)
                            <section class="experience-details mt-6">
                                <h3>{{ fake()->jobTitle() }} &#x2022; {{ fake()->company() }}</h3>
                                <p class="text-tender-400 text-sm">April 2023 - Present
                                    | {{ fake()->city() . ", " . fake()->country() }}</p>
                                <div class="mt-4">
                                    <p>[Briefly describe your role, responsibilities, and major achievements. Focus on
                                        leadership, strategy, and any board-level interactions or decisions.]</p>

                                    <ul class="mt-4 list-disc">
                                        <li>Lead the financial strategy and operations, overseeing budgeting,
                                            forecasting,
                                            financial reporting, and risk management.
                                        </li>
                                        <li>Achieved a 70% increase in revenue through strategic initiatives and market
                                            expansion.
                                        </li>
                                        <li>Implemented financial controls and processes, reducing financial risk by 60%
                                        </li>
                                    </ul>

                                </div>
                            </section>
                        @endforeach
                    </div>

                    <div class="experience mt-10">
                        <h2>Board Experience</h2>
                        @foreach(range(1, 3) as $experience)
                            <section class="experience-details mt-6">
                                <h3>{{ fake()->jobTitle() }} &#x2022; {{ fake()->company() }}</h3>
                                <p class="text-tender-400 text-sm">April 2023 - Present
                                    | {{ fake()->city() . ", " . fake()->country() }}</p>
                                <div class="mt-4">
                                    <p>[Briefly describe your role, responsibilities, and major achievements. Focus on
                                        leadership, strategy, and any board-level interactions or decisions.]</p>
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
                <div class="cv-sidebar">
                    <div class="side-category">
                        <h2 class="mb-6">Achievements</h2>
                        @foreach(range(1, 3) as $catItem)
                            <div class="mt-4">
                                <h3>Fund raising</h3>
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        @endforeach
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
                                @foreach(range(1, 4) as $catItem)
                                    <li>[Award Name], [Awarding Body], [Year]</li>
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
                        <h2 class="mb-2">Languages</h2>
                        <div class="mt-4">
                            <table class="w-full" cellspacing="20px">
                                @foreach(["English", "Spanish", "French"] as $language)
                                    <tr>
                                        <td class="w-1/2">
                                            <p><b>{{ $language }}</b> (Native)</p>
                                        </td>
                                        <td class="w-1/2">
                                            <p class="text-4xl text-mustard leading-none">{!! str_repeat("&#x2022;", 5) !!}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <p class="font-bold mt-8 text-center">Powered by TheBoardroom Africa</p>
</section>
</body>
</html>
