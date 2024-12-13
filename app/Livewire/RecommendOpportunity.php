<?php

namespace App\Livewire;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RecommendOpportunity extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public $opportunity;

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('their_full_name')
                    ->required(),
                Forms\Components\TextInput::make('their_email')
                    ->required(),
                Forms\Components\TextInput::make('their_current_position')
                    ->required(),
                Forms\Components\TextInput::make('their_organisation')
                    ->required(),
                Forms\Components\RichEditor::make('reason')
                    ->helperText('Making a recommendation is a great way to connect talented people in your network with new board-level roles. They will need to have either sat on a board before, or have skills and experience that make them board-ready.')
                    ->label('Reason for your recommendation')
                    ->columnSpan('full')
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        redirect()->route('opportunities.show', $this->opportunity);
    }

    public function render(): View
    {
        return view('livewire.recommend-opportunity');
    }
}
