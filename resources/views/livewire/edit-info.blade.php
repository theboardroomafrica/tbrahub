<div class="profile-intro">

    @if($this->model == "others")
        <div class="p-12 bg-[#F3F7FA] flex justify-between items-center">
            <div class="flex gap-8 items-center">
                <img src="https://placehold.co/100" class="rounded-full">
                <div>
                    <div class="flex gap-4 items-center">
                        <h1 class="text-3xl font-bold">{{ $user->name }}</h1> {{ $this->editAction }}
                    </div>
                    <p class="text-xl">{{ $user->title }}</p>
                </div>
            </div>
            <div class="contact-details text-right">
                {{-- <a href="#" class="btn btn-mustard ml-auto inline-block">Connect with me</a> --}}
                <p>{{ $user->phone }}</p>
                <p>{{ $user->email }}</p>
                <p>{!! nl2br($user->address) !!}</p>
                <a href="{{ $user->linkedin }}" class="mt-4 font-bold text-sm text-blue-500 inline-block">LinkedIn
                    Profile</a>
            </div>
        </div>
    @endif

    @if($this->model == "bio")

        <div class="flex gap-4 items-center">
            <h2>Profile summary</h2> {{ $this->editAction }}
        </div>
        <p class="intro mt-4">{{ $user->bio }}</p>
    @endif
    <x-filament-actions::modals/>
</div>
