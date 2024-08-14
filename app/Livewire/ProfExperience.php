<?php

namespace App\Livewire;

use App\Filament\Utilities\FormUtility;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Livewire\Component;

class ProfExperience extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public $record;

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                ...FormUtility::ProfersionalExperience()
            ])
            ->color('info')
            ->modalWidth(MaxWidth::SixExtraLarge)
            ->iconButton()
            ->icon('heroicon-o-pencil')
            ->record($this->record);
    }

    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->requiresConfirmation()
            ->iconButton()
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->action(fn() => $this->record->delete());
    }

    public function render()
    {
        return view('livewire.prof-experience');
    }
}
