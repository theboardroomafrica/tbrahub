<div class="profile-intro">
    <div class="flex gap-4 items-center">
        <h2>Profile summary</h2> {{ $this->editAction }}
    </div>
    <p class="intro mt-4">{{ $user->bio }}</p>
    <x-filament-actions::modals/>
</div>
