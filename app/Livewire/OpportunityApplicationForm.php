<?php

namespace App\Livewire;

use App\Filament\Actions\GenerateWithAiAssistant;
use App\Models\Experience;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use App\Models\OpportunityApplicationExperience;
use App\Models\ProfessionalExperience;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
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
                        Actions::make([
                            $this->optimizeWithAi()
                        ]),
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

        $this->record->updateOrCreate([
            'opportunity_id' => $this->opportunity->id,
            'user_id' => $this->user->id,
        ], [
            'reason' => $data['reason'] ?? null,
            'cover_letter' => $data['cover_letter'] ?? null,
        ]);

        $this->record->experiences()->delete();

        foreach (($data['experiences'] ?? []) as $opportunityExperienceId => $appExpData) {
            foreach ($appExpData['professional_experience_id'] as $experienceId) {
                OpportunityApplicationExperience::updateOrCreate([
                    'opportunity_application_id' => $this->record->id,
                    'opportunity_experiences_id' => $opportunityExperienceId,
                    'professional_experience_id' => $experienceId,
                ], [
                    'message' => $appExpData['message'],
                ]);
            }
        }
    }

    public function render(): View
    {
        return view('livewire.opportunity-application-form');
    }

    public function opportunityExperienceFields()
    {
        $fields = [];
        $professionalExperiences = ProfessionalExperience::where('user_id', $this->user_id)->pluck('position', 'id');

        if (count($this->opportunityExperiences)) {
            $fields[] = Placeholder::make('relevant_experiences');
        }

        foreach ($this->opportunityExperiences as $i => $opportunityExperience) {
            $experienceName = $opportunityExperience->experience->name;
            $experienceId = $opportunityExperience->experience->id;

            $fields[] = Fieldset::make($experienceName)
                ->schema([
                    Select::make("experiences.{$experienceId}.professional_experience_id")
                        ->label("Please pick up to 3 roles that best demonstrate your fit for this skill")
                        ->options($professionalExperiences)
                        ->maxItems(3)
                        ->required(fn($get) => !empty($get("experiences.{$experienceId}.message")))
                        ->multiple(),
                    RichEditor::make("experiences.{$experienceId}.message")
                        ->label("")
                        ->required(fn($get) => !empty($get("experiences.{$experienceId}.professional_experience_ids")))
                        ->placeholder("Please demonstrate your experience in a commercial or strategic role in an {$experienceName} business and specific experience growing the business including role, key metrics, and details of your direct contribution to the organisation's growth. "),
                    Actions::make([
                        $this->optimizeWithAi()
                    ])
                ])
                // ->collapsible()
                // ->collapsed($i > 0)
                ->columns(1);
        }

        return $fields;
    }

    public function optimizeWithAi(): Action
    {
        return Action::make('optimize')
            ->label("Optimise with AI")
            ->color('gray')
            ->icon('heroicon-o-sparkles');
    }
}
