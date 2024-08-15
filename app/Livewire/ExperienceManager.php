<?php

namespace App\Livewire;

use App\Filament\Utilities\FormUtility;
use App\Models\Achievement;
use App\Models\BoardExperience;
use App\Models\ProfessionalExperience;
use App\Models\UserLanguage;
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

    public $records;
    public $actions = false;
    public $model = "professional";
    public $title = "Professional Experience";
    public $user;

    public function mount()
    {
        $this->records = $this->modelOptions()[$this->model]["records"];
    }

    public function getModel()
    {
        return $this->modelOptions()[$this->model]["model"];
    }

    public function getWidth()
    {
        return $this->modelOptions()[$this->model]["width"] ?? MaxWidth::SixExtraLarge;
    }

    public function getFormUtility()
    {
        return $this->modelOptions()[$this->model]["form"];
    }

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                ...$this->getFormUtility()
            ])
            ->color('info')
            ->modalWidth($this->getWidth())
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
            ->modalWidth($this->getWidth())
            ->extraAttributes(['class' => 'btn-tender text-white hover:text-white'])
            ->modalHeading('Add ' . $this->title)
            ->action(function ($data) {
                $user = auth()->user();
                $this->getModel()::create(['user_id' => $user->id, ...$data]);

                $this->emit('refresh');
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

    private function modelOptions()
    {
        return [
            "professional" => [
                "records" => $this->user->orderedProfessionalExperiences(),
                "model" => ProfessionalExperience::class,
                "form" => FormUtility::ProfersionalExperience()
            ],
            "board" => [
                "records" => $this->user->orderedBoardExperiences(),
                "model" => BoardExperience::class,
                "form" => FormUtility::BoardExperience()
            ],
            "achievement" => [
                "records" => $this->user->achievements,
                "model" => Achievement::class,
                "form" => FormUtility::achievements(),
                "width" => MaxWidth::ExtraLarge
            ],
            "language" => [
                "records" => $this->user->languages,
                "model" => UserLanguage::class,
                "form" => FormUtility::Languages(),
                "width" => MaxWidth::Large
            ],
        ];
    }
}
