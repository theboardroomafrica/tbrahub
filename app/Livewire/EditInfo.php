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

class EditInfo extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public $user;
    public $model = "bio";

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                ...$this->modelOptions()[$this->model]["form"]
            ])
            ->tooltip("Edit info")
            ->color('info')
            ->modalWidth(MaxWidth::Large)
            ->modalHeading("")
            ->iconButton()
            ->icon('heroicon-o-pencil')
            ->record(request()->user());
    }

    public function render(): View
    {
        return view('livewire.edit-info');
    }

    public function modelOptions()
    {
        return [
            "bio" => [
                "form" => [
                    Forms\Components\Textarea::make('bio')
                        ->rows(5)
                        ->label("Profile summary / bio")
                ]
            ],
            "others" => [
                "form" => [
                    Forms\Components\TextInput::make('title'),
                    Forms\Components\TextInput::make('email'),
                    Forms\Components\Textarea::make('address')
                        ->rows(3),
                    Forms\Components\TextInput::make('linkedin')
                        ->url(),
                    Forms\Components\TextInput::make('phone'),
                ]
            ]
        ];
    }
}
