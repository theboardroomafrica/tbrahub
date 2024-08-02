<x-app-layout>
    <section class="mt-8">
        <div class="container">
            <div class="h-[400px] bg-darkblue border rounded-xl p-16 flex flex-col justify-center text-white gap-4">
                <h2 class="text-5xl font-bold font-libre">Welcome, Charlotte!</h2>
                <p class="max-w-3xl">Thanks for joining TheBoardroom Africa. To be eligible for board opportunities you
                    must
                    complete your profile, but don’t worry, we will guide you through the whole process. Here’s your
                    progress so far:</p>
                <div class="flex gap-8 mt-4">
                    <a href="#" class="btn btn-dawn flex items-center">View Profile</a>
                    <a href="#" class="btn btn-mustard flex gap-2 items-center">
                        <x-heroicon-o-sparkles class="h-6 w-6 text-white"/>
                        Cover letter generator</a>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="container grid grid-cols-[1fr_2fr] gap-16">
            <div class="sidebar">
                <h3 class="font-bold mb-4 text-md">
                    Check this space
                </h3>
                <img src="https://placehold.co/400x500" class="rounded-md"/>

                <img src="https://placehold.co/400x150" class="rounded-md mt-8"/>
            </div>

            <div class="mainbar">
                <div class="flex justify-between mb-4">
                    <h3 class="font-bold text-md">
                        Board Opportunities
                    </h3>
                    <a href="#" class="btn btn-tender -mt-3">All Opportunities</a>
                </div>
                <div class="opportunities grid grid-cols-2 gap-12">
                    <div class="pt-6 border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                        <img src="https://placehold.co/150" class="mx-auto"/>
                        <div class="bg-dawn-500 mt-6 text-center p-3">INED Role - UpEnergy Group</div>
                    </div>
                    <div class="pt-6 border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                        <img src="https://placehold.co/150" class="mx-auto"/>
                        <div class="bg-dawn-500 mt-6 text-center p-3">INED Role - UpEnergy Group</div>
                    </div>
                </div>

                <div class="flex justify-between mb-4 mt-16">
                    <h3 class="font-bold text-md">
                        Board Opportunities
                    </h3>
                    <a href="#" class="btn btn-tender -mt-3">All Opportunities</a>
                </div>
                <div class="opportunities grid grid-cols-2 gap-12">
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                        <img src="https://placehold.co/400x250" class="mx-auto h-[250px] object-cover"/>
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
                    </div>
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                        <img src="https://placehold.co/400x250" class="mx-auto h-[250px] object-cover"/>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="rounded-lg border mt-16 py-12 px-16 flex justify-between bg-white">
                <div class="">
                    <h2 class="text-3xl font-bold">Connect on the go</h2>
                    <p class="text-xl">Download TheBoardroom Africa mobile app</p>
                </div>
                <div class="flex gap-4">
                    <img src="https://placehold.co/200x70">
                    <img src="https://placehold.co/200x70">
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
