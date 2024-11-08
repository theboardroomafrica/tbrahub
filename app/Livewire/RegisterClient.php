<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\GrowthStage;
use App\Notifications\NotifyClientRegistration;
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
                    ->columns(3),
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
                            ->options([
                                "Agriculture & Farming",
                                "Automotive",
                                "Aerospace & Defense",
                                "Banking & Financial Services",
                                "Biotechnology & Pharmaceuticals",
                                "Chemicals & Petrochemicals",
                                "Construction & Real Estate",
                                "Consumer Goods",
                                "Education",
                                "Energy",
                                "Entertainment & Media",
                                "Healthcare & Medical Services",
                                "Hospitality & Tourism",
                                "Information Technology (IT)",
                                "Legal Services",
                                "Logistics & Transportation",
                                "Manufacturing",
                                "Mining & Metals",
                                "Retail",
                                "Telecommunications",
                                "Utilities",
                                "Agriculture",
                                "Financial Services",
                                "Healthcare",
                                "Technology",
                                "Construction",
                                "Transportation & Logistics",
                                "Real Estate",
                                "Government & Public Sector",
                            ])
                            ->label('Sector'),
                        Forms\Components\Select::make('for_profit')
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
                    ->columns(4),
                Forms\Components\Section::make('')
                    ->schema([
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
                            ->label('Number of portfolio companies / clients')
                            ->reactive(),
                        Forms\Components\TextInput::make('parent_company')
                            ->placeholder('Parent Company (if any)'),
                        Forms\Components\Hidden::make(''),
                        Forms\Components\Toggle::make('mulitple_search')
                            ->label('Will you be conducting searches for your portfolio companies or clients?')
                            ->visible(fn($get) => $get('portfolios') && $get('portfolios') !== 'None')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ])
            ->columns(2)
            ->statePath('data')
            ->model(Client::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $client = Client::create($data);
        $this->form->model($client)->saveRelationships();
        $client->notify(new NotifyClientRegistration());
        $this->redirect('/clients/submitted');
    }

    public function render(): View
    {
        return view('livewire.register-client');
    }
}
