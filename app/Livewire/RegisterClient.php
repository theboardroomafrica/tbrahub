<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\GrowthStage;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterClient extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->placeholder('Enter full name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('Enter email')
                            ->required()
                            ->email(),
                        Forms\Components\TextInput::make('company')
                            ->label('Company / Legal Entity')
                            ->placeholder('Enter company')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('role')
                            ->placeholder('Enter role or title')
                            ->label('Role / title')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->placeholder('Enter phone number')
                            ->required(),
                        Forms\Components\TextInput::make('website')
                            ->placeholder("Enter company's website")
                            ->url()
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpan(2),
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\Select::make('org_type')
                            ->required()
                            ->options([
                                "Independent Company" => "Independent Company",
                                "Investment firm" => "Investment firm",
                                "Group of companies" => "Group of companies",
                                "Subsidiary of a group" => "Subsidiary of a group",
                                "Recruitment agency" => "Recruitment agency",
                                "Other" => "Other",
                            ])
                            ->label("Organisation Type"),
                        Forms\Components\Select::make('sector_id')
                            ->required()
                            ->label('Sector'),
                        Forms\Components\Select::make('type_id')
                            ->required()
                            ->options([
                                "For profit",
                                "Not for profit"
                            ])
                            ->label('Category'),
                        Forms\Components\Select::make('growth_stage_id')
                            ->required()
                            ->options(fn() => GrowthStage::pluck('name', 'id'))
                            ->label('Growth Stage'),
                    ])
                    ->columns(4)
                    ->columnSpan(2),
                Forms\Components\Section::make('')
                    ->schema([
                        // Forms\Components\Toggle::make('investment_firm')
                        //     ->label('Is your company an investment firm?'),
                        // Forms\Components\Toggle::make('recruitment_agency')
                        //     ->label('Is your company a recruitment agency?'),
                        Forms\Components\Toggle::make('mulitple_search')
                            ->label('Will you be conducting searches for your portfolio companies or clients?')
                            ->columnSpan(3),
                        Forms\Components\Select::make('portfolios')
                            ->options([
                                "None",
                                "< 5",
                                "< 10",
                                "<20",
                                "<30",
                                "<40",
                                "<50",
                                "50+",])
                            ->label('Number of portfolio companies / clients'),
                        Forms\Components\TextInput::make('parent_company')
                            ->placeholder('Parent Company')
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpan(2),
            ])
            ->columns(2)
            ->statePath('data')
            ->model(Client::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Client::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.register-client');
    }
}
