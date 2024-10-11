<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="btn btn-tender mt-8">
            Submit Application
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
