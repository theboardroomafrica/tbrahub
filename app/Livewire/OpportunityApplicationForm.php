<?php

namespace App\Livewire;

use App\Filament\Actions\GenerateWithAiAssistant;
use App\Models\Experience;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use App\Models\ProfessionalExperience;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class OpportunityApplicationForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public OpportunityApplication $record;
    public string $response = '';
    public $opportunity_id;
    public $user;
    public $user_id;
    public Opportunity $opportunity;
    public $opportunityExperiences;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->user_id = $this->user->id;
        $this->opportunityExperiences = $this->opportunity->opportunityExperiences;
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        $experiences = Experience::all();
        $professionalExperiences = ProfessionalExperience::where('user_id', $this->user->id)->get();

        return $form
            ->schema([
                Section::make()
                    ->schema([
                        ...($this->opportunityExperienceFields()),
                        RichEditor::make('reason')
                            ->label('Reason for application')
                            ->placeholder("What is your reason for applying for this role?")
                            ->required(),
                        RichEditor::make('cover_letter')
                            ->placeholder("Write your cover letter here or use the AI generator...")
                            ->label('Cover Letter'),
                        Actions::make([
                            GenerateWithAiAssistant::make()
                                ->target('cover_letter')
                                ->assistantId(assistantId())
                                ->content(memberCv())
                        ])
                    ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        // $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.opportunity-application-form');
    }

    public function opportunityExperienceFields()
    {
        $fields = [];
        $professionalExperiences = ProfessionalExperience::where('user_id', $this->user_id)->pluck('position', 'id');
        $fields[] = Placeholder::make('relevant_experiences');
        foreach ($this->opportunityExperiences as $i => $opportunityExperience) {
            $experienceName = $opportunityExperience->experience->name;

            $fields[] = Section::make($experienceName)
                ->schema([
                    Select::make("application_experiences.{$opportunityExperience->id}.professional_experience_id")
                        ->label("Please pick up to 3 roles that best demonstrate your fit for this skill")
                        ->options($professionalExperiences)
                        // ->required()
                        ->multiple(),
                    RichEditor::make("application_experiences.{$opportunityExperience->id}.message")
                        ->label("")
                        // ->required()
                        ->placeholder("Please demonstrate your experience in a commercial or strategic role in an {$experienceName} business and specific experience growing the business including role, key metrics, and details of your direct contribution to the organisation's growth. "),
                ])
                ->collapsible()
                ->collapsed($i > 0)
                ->columns(1);
        }

        return $fields;
    }
}
