<x-dash-layout>

    <x-title-bar title="Welcome, {{ auth()->user()->first_name }}!"/>

    <section>
        <div class="container grid grid-cols-[2fr_1fr] gap-8">
            <div class="mainbar">
                <div class="card2">
                    <div class="flex justify-between mb-4">
                        <h3 class="font-bold text-md">
                            New Opportunities
                        </h3>
                        <a href="{{ route('opportunities.index') }}" class=""> → All Opportunities</a>
                    </div>
                    <div class="opportunities grid grid-cols-3 gap-6">
                        <a href="#" class="pt-6 border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <img alt="Opportunity Logo"
                                 src="https://www.afsic.net/wp-content/uploads/2022/03/Norsad-Capital-logo.jpg"
                                 class="mx-auto h-16"/>

                            <div class="bg-gray-200 mt-6 p-3">
                                <p class="font-semibold">Independent Non Executive Director</p>
                            </div>
                        </a>
                        <a href="#" class="pt-6 border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <img alt="Opportunity Logo"
                                 src="https://mastercardfdn.org/wp-content/uploads/2018/10/mcf-logo.jpg"
                                 class="mx-auto h-16"/>

                            <div class="bg-gray-200 mt-6 p-3">
                                <p class="font-semibold">Independent Non Executive Director</p>
                            </div>
                        </a>
                        <a href="#" class="pt-6 border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <img alt="Opportunity Logo"
                                 src="https://web.theboardroomafrica.com/wp-content/uploads/2022/08/01-unilever.jpg"
                                 class="mx-auto h-16"/>

                            <div class="bg-gray-200 mt-6 p-3">
                                <p class="font-semibold">Independent Non Executive Director</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card2 mt-8">
                    <div class="flex justify-between">
                        <h3 class="font-bold text-md">
                            Events and programmes
                        </h3>
                        <a href="#" class=""> → All Events / Programmes</a>
                    </div>
                    <div class="opportunities grid grid-cols-2 gap-8 mt-4">
                        <a href="#" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <img alt=""
                                 src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1715676734/WebinarBnnr_tgsrkk.jpg"
                                 class="mx-auto h-[200px] object-cover"/>
                            <div class="p-4 flex gap-3 items-center">
                                <div class="bg-mustard-200 text-sm py-1 px-3 rounded flex flex-col">
                                    <p class="text-mustard-600 font-bold text-xs">JUL</p>
                                    <p class="text-xl font-bold leading-none">19</p>
                                </div>
                                <div class="">
                                    <h3 class="font-bold">Developing Executive Presence</h3>
                                    <p class="text-sm"><b>Coach:</b> Rachel Adams</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <img alt=""
                                 src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1720431441/SteveWebinerBG_vnpvbd.jpg"
                                 class="mx-auto h-[200px] object-cover"/>
                            <div class="p-4 flex gap-3 items-center">
                                <div class="bg-mustard-200 text-sm py-1 px-3 rounded flex flex-col">
                                    <p class="text-mustard-600 font-bold text-xs">JUL</p>
                                    <p class="text-xl font-bold leading-none">19</p>
                                </div>
                                <div class="">
                                    <h3 class="font-bold">Developing Executive Presence</h3>
                                    <p class="text-sm"><b>Coach:</b> Rachel Adams</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sidebar card self-start">
                <h3 class="font-bold mb-4 text-md">Professional Support</h3>
                <img src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1732675512/NextInterview_poflst.jpg" alt=""
                     class="rounded-md"/>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="card2 mt-8 py-12 px-16 flex justify-between">
                <div class="">
                    <h2 class="text-3xl font-bold">Connect on the go</h2>
                    <p class="text-xl">Download TheBoardroom Africa mobile app</p>
                </div>
                <div class="flex gap-4">
                    <img class="h-[70px]"
                         src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1732676101/play_f4zwjc.svg">
                    <img class="h-[70px]"
                         src="https://res.cloudinary.com/dhhw72iwq/image/upload/v1732676101/app_vudinv.svg">
                </div>
            </div>
        </div>
    </section>
</x-dash-layout>
