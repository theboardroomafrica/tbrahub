<x-dash-layout>
    <section class="pt-12">
        <x-opportunity-header :opportunity="$opportunity" :hideApply="true"/>

        <div class="container">
            <div class="card2 rounded-t-none border-t-0 pb-16">
                <div class="max-w-4xl mt-8 mx-auto">
                    <h2 class="mb-4 text-xl font-semibold">Role application</h2>
                    <livewire:opportunity-application-form :opportunity="$opportunity" :record="$application"/>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
