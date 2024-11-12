<x-app-layout>
    <section class="mt-8">
        <div class="container">
            <div class="bg-darkblue border rounded-xl p-16 flex flex-col justify-center text-white gap-4">
                <h2 class="text-3xl font-bold font-libre">Opportunities</h2>
                <p class="max-w-3xl">Review and manage opportunities for board and executive
                    opportunities. Click on an opportunity to learn more and apply.</p>
            </div>
        </div>
    </section>
    <section class="mt-12">
        <div class="container">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($opportunities as $opportunity)
                    <div class="border rounded-xl p-4 bg-white flex flex-col">
                        <div class="flex items-center">
                            <img alt="{{ $opportunity->company }} Logo" src="https://placehold.co/300" width="80"
                                 class="rounded-full">
                            <div class="ml-3 flex-1">
                                <a href="{{ route('opportunities.show', $opportunity) }}"
                                   class="font-bold text-[17px] line-clamp-1">{{ $opportunity->company }}</a>
                                <p><b>Closes:</b> {{ $opportunity->deadline->format('d M Y') }}</p>
                                <div class="flex mt-2 gap-2">
                                    <span class="badge badge-mustard">Fintech</span>
                                    <span class="badge badge-tender">Global Opportunity</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-tender-50 rounded-xl flex-1">
                            <div class="flex justify-between">
                                <p class="font-bold text-[18px]">{{ $opportunity->name }}</p>
                            </div>
                            <p class="mt-2 line-clamp-3">{{ strip_tags($opportunity->info) }}</p>
                        </div>

                        <div class="mt-auto flex pt-3 gap-4 items-center justify-between">
                            @unless($opportunity->deadline->isPast())
                                <a href="{{ route('opportunities.show', $opportunity) }}"
                                   class="btn btn-tender">Apply</a>
                            @else
                                <a href="javascript:void(0)" class="btn btn-disabled">Apply</a>
                            @endunless
                            <x-badge :state="!$opportunity->deadline->isPast()">
                                Application {{ $opportunity->deadline->isPast() ? "closed" : "ongoing" }}</x-badge>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $opportunities->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
