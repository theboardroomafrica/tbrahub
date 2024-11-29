<x-dash-layout>

    {{--    <x-title-bar title="Role: {{$opportunity->name}}" hideButton="true"/>--}}

    <section class="pt-12">

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
                            <a href="#" class="btn btn-tender flex items-center gap-1">
                                <x-heroicon-o-document-text class="w-4 h-4"/>
                                Apply for role
                            </a>
                            <a href="#" class="btn btn-white flex items-center gap-1">
                                <x-heroicon-o-arrow-right-circle class="w-4 h-4"/>
                                Recommend someone
                            </a>
                        </div>
                    </div>
                    <img class="" alt="" src="https://placehold.co/150x70"/>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="card2 rounded-t-none border-t-0">
            <div class="prose max-w-4xl mt-8 mx-auto">
                {!! $opportunity->brief !!}
            </div>
            <div class="mt-8 flex gap-4 justify-center border-t py-8">
                <a href="#" class="btn btn-tender flex items-center gap-1">
                    <x-heroicon-o-document-text class="w-4 h-4"/>
                    Apply for role
                </a>
                <a href="#" class="btn btn-white flex items-center gap-1">
                    <x-heroicon-o-arrow-right-circle class="w-4 h-4"/>
                    Recommend someone
                </a>
            </div>
        </div>
    </div>
    </section>
</x-dash-layout>
