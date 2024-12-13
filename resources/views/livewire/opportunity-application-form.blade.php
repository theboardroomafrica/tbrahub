<div>
    <form wire:submit="save">
        {{ $this->form }}


        <div class="mt-8">
            <x-filament::button type="button" wire:click="saveDraft" class="">
                Save Draft
            </x-filament::button>

            <button type="submit" class="btn btn-tender">
                Submit Application
            </button>
        </div>
    </form>

    <x-filament-actions::modals/>
</div>
