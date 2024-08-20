<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditBio extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public $user;

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                Forms\Components\Textarea::make('bio')
                    ->rows(5)
                    ->label("Profile summary / bio")
            ])
            ->tooltip("Edit Bio")
            ->color('info')
            ->modalWidth(MaxWidth::Large)
            ->modalHeading("")
            ->iconButton()
            ->icon('heroicon-o-pencil')
            ->record(request()->user());
    }

    public function render(): View
    {
        return view('livewire.edit-bio');
    }
}
