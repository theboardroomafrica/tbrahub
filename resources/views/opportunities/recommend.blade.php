<x-dash-layout>

    <section class="pt-12">
        <x-opportunity-header :opportunity="$opportunity" :hideRecommend="true"/>

        <div class="container">
            <div class="card2 rounded-t-none border-t-0">
                <div class="max-w-4xl mt-8 mx-auto">
                    <h2 class="text-xl font-semibold">Recommend someone</h2>
                    <p class="mt-4">Making a recommendation is a great way to connect talented people in your network
                        with new board-level roles. They will need to have either sat on a board before, or have skills
                        and experience that make them board-ready.</p>

                    <div class="mt-8">
                        <livewire:recommend-opportunity :opportunity="$opportunity"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
