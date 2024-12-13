<div class="mt-8">
    <form wire:submit="submit">
        {{ $this->form }}

        <button type="submit" class="btn btn-tender mt-8">
            Submit Recommendation
        </button>
    </form>

    <x-filament-actions::modals/>
</div>
