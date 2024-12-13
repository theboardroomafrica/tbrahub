<div class="border rounded-xl p-4 bg-white flex flex-col">
    <div class="flex items-center">
        <img alt="{{ $opportunity->company }} Logo" src="{{ $opportunity->website ?? 'https://placehold.co/150x70' }}"
             width="80" height="80"
             class="bg-cover object-cover">
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
    @unless(isset($simple) && $simple)
        <div class="mt-4 p-3 bg-tender-50 rounded-xl flex-1">
            <div class="flex justify-between">
                <p class="font-bold text-[18px]">{{ $opportunity->name }}</p>
            </div>
            <p class="mt-2 line-clamp-3">{{ strip_tags($opportunity->info) }}</p>
        </div>

        <div class="mt-auto flex pt-3 items-center justify-between">
            <div class="flex gap-2">
                @unless($opportunity->deadline->isPast())
                    <a href="{{ route('opportunities.show', $opportunity) }}"
                       class="btn btn-tender">Apply</a>
                    <a href="#" class="btn btn-white">Recommend</a>
                @else
                    <a href="javascript:void(0)" class="btn btn-disabled">Apply</a>
                @endunless
            </div>
            <x-badge :state="!$opportunity->deadline->isPast()">
                Application {{ $opportunity->deadline->isPast() ? "closed" : "ongoing" }}</x-badge>
        </div>
    @endunless
</div>
