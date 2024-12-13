<?php

namespace App\Livewire;

use App\Filament\Actions\GenerateWithAiAssistant;
use App\Models\OpportunityApplication;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
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
            ->columns(2)
            ->statePath('data')
            ->model(OpportunityApplication::class);
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
}
