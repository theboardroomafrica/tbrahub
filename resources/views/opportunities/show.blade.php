<x-dash-layout>

    {{--    <x-title-bar title="Role: {{$opportunity->name}}" hideButton="true"/>--}}

    <section class="pt-12">

        <x-opportunity-header :opportunity="$opportunity" hideApply="true"/>

        <div class="container">
            <div class="card2 rounded-t-none border-t-0">
                <div class="prose max-w-4xl mt-8 mx-auto">
                    {!! $opportunity->brief !!}
                </div>
                <div class="mt-8 flex gap-4 justify-center border-t py-8">
                    <a href="{{ route('opportunities.apply', $opportunity) }}"
                       class="btn btn-tender flex items-center gap-1">
                        <x-heroicon-o-document-text class="w-4 h-4"/>
                        Apply for role
                    </a>
                    <a href="{{ route('opportunities.recommend', $opportunity) }}"
                       class="btn btn-white flex items-center gap-1">
                        <x-heroicon-o-arrow-right-circle class="w-4 h-4"/>
                        Recommend someone
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
