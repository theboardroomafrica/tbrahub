<?php

namespace App\Livewire;

use App\Models\OpportunityApplication;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

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
                            Action::make('generate_cover_letter')
                                ->icon('heroicon-o-sparkles')
                                ->action(function (Get $get, Set $set) {
                                    $response = '';

                                    $stream = OpenAI::threads()->createAndRunStreamed([
                                        'assistant_id' => assistantId(),
                                        'model' => 'gpt-4o-mini',
                                        'thread' => [
                                            'messages' => [
                                                [
                                                    'role' => 'user',
                                                    'content' => memberCv(),
                                                ],
                                            ],
                                        ],
                                    ]);

                                    foreach ($stream as $streamResponse) {
                                        $content = '';
                                        if ($streamResponse->event == 'thread.message.delta') {
                                            $content = $streamResponse->response['delta']['content'][0]['text']['value'];
                                            $response .= $content;
                                            $set('cover_letter', $response);
                                        }
                                    }
                                })
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
