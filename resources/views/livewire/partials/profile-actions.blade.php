@if($this->actions)
    <div class="flex gap-2">
        {{ ($this->editAction)(['experience_id' => $record->id]) }}
        {{ ($this->deleteAction)(['experience_id' => $record->id]) }}
    </div>
@endif
