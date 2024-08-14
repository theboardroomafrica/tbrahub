<div class="flex gap-2 mt-1">
    {{ $this->editAction }}
    {{ $this->deleteAction }}
    {{--    <x-filament-actions::group :actions="[--}}
    {{--        $this->editAction,--}}
    {{--        $this->deleteAction,--}}
    {{--    ]"/>--}}

    <x-filament-actions::modals/>
</div>
