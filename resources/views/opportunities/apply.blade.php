<x-dash-layout>

    <section class="pt-12">
        <x-opportunity-header :opportunity="$opportunity" :hideApply="true"/>

        <div class="container">
            <div class="card2 rounded-t-none border-t-0">
                <div class="max-w-4xl mt-8 mx-auto">
                    <livewire:cover-generator/>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
