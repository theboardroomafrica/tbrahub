<div>
    <div class="relative w-72 h-72 group profilePic rounded-full rounded overflow-hidden">
        <img src="https://via.placeholder.com/300" alt="Sample Image" class="w-full h-full object-cover">
        <div
            class="inset-0 absolute text-white items-center justify-center text-white bg-black bg-opacity-50 p-2 rounded cursor-pointer hidden group-hover:flex"
            onclick="showAlert()">{{ $this->editAction }}</div>
    </div>
    {{--    <button wire:click="mountAction('edit')">Hello</button>--}}
    <x-filament-actions::modals/>
</div>
