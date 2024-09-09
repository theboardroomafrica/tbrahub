<div class="profile-intro">

    @if($this->model == "others")
        <div class="p-12 bg-[#F3F7FA] flex justify-between items-center">
            <div class="flex gap-8 items-center">
                <div class="relative w-28 h-28 group profilePic rounded-full rounded overflow-hidden bg-white">
                    <img src="{{ $user->avatar }}" class="w-28 h-28 object-cover">
                    <div
                        class="inset-0 absolute text-white items-center justify-center text-white bg-black bg-opacity-50 p-2 rounded cursor-pointer hidden group-hover:flex"
                    >{{ $this->avatarAction }}</div>
                </div>
                <div>
                    <div class="flex gap-4 items-center">
                        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                        @if($this->actions)
                            {{ $this->editAction }}
                        @endif
                    </div>
                    <p class="text-xl">{{ $user->title }}</p>
                </div>
            </div>
            @if($this->actions)
                <div class="contact-details text-right">
                    {{-- <a href="#" class="btn btn-mustard ml-auto inline-block">Connect with me</a> --}}
                    <p>{{ $user->phone }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{!! nl2br($user->address) !!}</p>
                    <a href="{{ $user->linkedin }}" class="mt-4 font-bold text-sm text-blue-500 inline-block">LinkedIn
                        Profile</a>
                </div>
            @else
                <a href="#" class="btn btn-tender">Request connection</a>
            @endif
        </div>
    @endif

    @if($this->model == "bio")

        <div class="flex gap-4 items-center">
            <h2>Profile summary</h2>
            @if($this->actions)
                {{ $this->editAction }}
            @endif
        </div>
        <p class="intro mt-4">{{ $user->bio }}</p>
    @endif
    <x-filament-actions::modals/>
</div>
