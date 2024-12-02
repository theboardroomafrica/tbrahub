<div class="container">
    <div class="card px-16 py-12 rounded-b-none">
        <div class="flex justify-between">
            <div class="">
                <h3 class="text-3xl font-libre font-semibold">{{ $opportunity->name }}
                    — {{ $opportunity->company }}</h3>
                <div class="flex gap-4 mt-2">
                    <p href="#" class="flex gap-1 items-center">
                        <x-heroicon-o-document-currency-dollar class="w-6 h-6"/>
                        Compensated
                    </p>
                    <p href="#" class="flex gap-1 items-center">
                        <x-heroicon-o-map-pin class="w-6 h-6"/>
                        Global Opportunity
                    </p>
                    <p href="#" class="flex gap-1 items-center">
                        <x-heroicon-o-clock class="w-6 h-6"/>
                        Midnight on {{ $opportunity->deadline->format('F j, Y') }}
                    </p>
                </div>
                <div class="mt-4 flex gap-4">
                    @unless(!empty($hideApply))
                        <a href="{{ route('opportunities.apply', $opportunity) }}"
                           class="btn btn-tender flex items-center gap-1">
                            <x-heroicon-o-document-text class="w-4 h-4"/>
                            Apply for role
                        </a>
                    @endunless
                    @unless(!empty($hideRecommend))
                        <a href="{{ route('opportunities.recommend', $opportunity)}}"
                           class="btn btn-white flex items-center gap-1">
                            <x-heroicon-o-arrow-right-circle class="w-4 h-4"/>
                            Recommend someone
                        </a>
                    @endunless
                </div>
            </div>
            <img class="" alt="" src="{{ $opportunity->logo ?? 'https://placehold.co/150x70' }}"/>
        </div>
    </div>
</div>
