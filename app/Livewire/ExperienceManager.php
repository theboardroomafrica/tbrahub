<?php

namespace App\Livewire;

use App\Filament\Utilities\FormUtility;
use App\Models\BoardExperience;
use App\Models\ProfessionalExperience;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Livewire\Component;

class ExperienceManager extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public $experiences;
    public $actions = false;
    public $model = "professional";
    public $title = "Professional Experience";
    public $user;

    public function mount()
    {
        $this->experiences = $this->model == 'professional' ?
            $this->user->orderedProfessionalExperiences() :
            $this->user->orderedBoardExperiences();
    }

    public function getModel()
    {
        return $this->model == "professional" ? ProfessionalExperience::class : BoardExperience::class;
    }

    public function getFormUtility()
    {
        return $this->model == "professional" ? FormUtility::ProfersionalExperience() : FormUtility::BoardExperience();
    }

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                ...$this->getFormUtility()
            ])
            ->color('info')
            ->modalWidth(MaxWidth::SixExtraLarge)
            ->iconButton()
            ->icon('heroicon-o-pencil')
            ->record(function ($arguments) {
                return $this->getModel()::find($arguments['experience_id']);
            });
    }

    public function createAction(): Action
    {
        return Action::make('create')
            ->model($this->getModel())
            ->form([
                ...$this->getFormUtility()
            ])
            ->iconButton()
            ->extraAttributes(['class' => 'btn-tender text-white hover:text-white'])
            ->modalHeading('Add Professional Experience')
            ->action(function ($data) {
                $user = auth()->user();
                $this->getModel()::create(['user_id' => $user->id, ...$data]);
            })
            ->icon('heroicon-o-plus');
    }

    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->requiresConfirmation()
            ->iconButton()
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->action(fn($arguments) => $this->getModel()::find($arguments['experience_id'])->delete());
    }

    public function render()
    {
        return view('livewire.experience-manager');
    }
}
