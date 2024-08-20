<?php

namespace App\Livewire;

use App\Filament\Utilities\FormUtility;
use App\Models\Achievement;
use App\Models\BoardExperience;
use App\Models\ProfessionalExperience;
use App\Models\Recognition;
use App\Models\UserLanguage;
use App\Models\UserSkill;
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
    public $title;
    public $user;

    public function mount()
    {
        $this->records = $this->modelOptions()[$this->model]["records"];
        $this->title = $this->modelOptions()[$this->model]["title"];
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
            ->tooltip("Edit " . $this->title)
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
            ->tooltip("Add " . $this->title)
            ->iconButton()
            ->modalWidth($this->getWidth())
            ->extraAttributes(['class' => 'btn-tender text-white hover:text-white'])
            ->modalHeading('Add ' . $this->title)
            ->action(function ($data) {
                $user = auth()->user();
                $this->getModel()::create(['user_id' => $user->id, ...$data]);

                $this->records = $this->modelOptions()[$this->model]["records"];
            })
            ->icon('heroicon-o-plus');
    }

    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->requiresConfirmation()
            ->tooltip("Delete " . $this->title)
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
                "title" => "Professional Experience",
                "form" => FormUtility::ProfersionalExperience()
            ],
            "board" => [
                "records" => $this->user->orderedBoardExperiences(),
                "model" => BoardExperience::class,
                "title" => "Board Experience",
                "form" => FormUtility::BoardExperience()
            ],
            "achievement" => [
                "records" => $this->user->achievements()->get(),
                "model" => Achievement::class,
                "title" => "Achievement",
                "form" => FormUtility::achievements(),
                "width" => MaxWidth::ExtraLarge
            ],
            "language" => [
                "records" => $this->user->languages()->get(),
                "model" => UserLanguage::class,
                "title" => "Language",
                "form" => FormUtility::Languages(),
                "width" => MaxWidth::Large
            ],
            "recognition" => [
                "records" => $this->user->recognitions()->get(),
                "model" => Recognition::class,
                "title" => "Recognition",
                "form" => FormUtility::Recognitions(),
                "width" => MaxWidth::Large
            ],
            "board_skill" => [
                "records" => $this->user->boardSkills()->get(),
                "model" => UserSkill::class,
                "title" => "Board Skill",
                "form" => FormUtility::BoardSkills(),
                "width" => MaxWidth::Large
            ],
        ];
    }
}
