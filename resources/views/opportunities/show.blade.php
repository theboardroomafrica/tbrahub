<x-app-layout>
    <section class="mt-8">
        <div class="container">
            <div class="bg-darkblue border rounded-xl p-8 flex text-white gap-4 items-center">
                <div class="flex gap-4 items-center">
                    <img alt="{{ $opportunity->company }} Logo" src="https://placehold.co/300"
                         width="120"
                         class="rounded-lg">
                    <div class="">
                        <p>{{ $opportunity->company }}</p>
                        <h2 class="text-4xl font-bold font-libre">{{ $opportunity->name }}</h2>
                        <p class="flex items-center gap-1 mt-2">
                            <x-heroicon-o-calendar-days class="h-6 w-6"/>
                            <b>Deadline:</b> {{ $opportunity->deadline->format('d M Y') }}
                            ({{ $opportunity->deadlineDays }}
                            )
                        </p>
                    </div>
                </div>
                <div class="ml-auto flex flex-col items-end mr-8">
                    @unless($opportunity->deadline->isPast())
                        <a href="{{ route('opportunities.show', $opportunity) }}"
                           class="btn btn-tender">Submit Application</a>
                    @else
                        <x-badge :state="!$opportunity->deadline->isPast()">
                            Application {{ $opportunity->deadline->isPast() ? "closed" : "ongoing" }}</x-badge>
                    @endunless
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="container">
            <div class="rounded-xl border opportunity-details bg-white grid grid-cols-[2fr_1fr]">
                <div class="p-16">
                    {!! $opportunity->info !!}
                </div>
                <div class="bg-dawn-100 p-16">
                    All files to be downloaded
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
