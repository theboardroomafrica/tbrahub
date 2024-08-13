<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Utilities\FormUtility;
use App\Models\BoardPosition;
use App\Models\Committee;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Industry;
use App\Models\Interest;
use App\Models\Skill;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = "Member";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Member Info.')
                        ->schema([
                            Forms\Components\TextInput::make('first_name')
                                ->placeholder('First name')
                                ->required(),
                            Forms\Components\TextInput::make('last_name')
                                ->placeholder('Last name')
                                ->required(),
                            Forms\Components\TextInput::make('email')
                                ->placeholder('Email address')
                                ->email()
                                ->required(),
                            Forms\Components\TextInput::make('email2')
                                ->placeholder('Email address 2')
                                ->email(),
                            Forms\Components\DatePicker::make('date_of_birth')
                                ->required(),
                            Forms\Components\Select::make('gender_id')
                                ->label("Gender")
                                ->required()
                                ->options(Gender::all()->pluck('name', 'id'))
                                ->nullable(),
                            Forms\Components\TextInput::make('phone')
                                ->placeholder('Phone')
                                ->required()
                                ->tel(),
                            Forms\Components\TextInput::make('phone_alt')
                                ->placeholder('Alternative phone')
                                ->tel(),
                            Forms\Components\TextInput::make('website')
                                ->placeholder('Website')
                                ->url(),
                            Forms\Components\TextInput::make('linkedin')
                                ->placeholder('Linkedin')
                                ->url(),
                            Forms\Components\Select::make('country_id')
                                ->label("Country")
                                ->required()
                                ->options(Country::all()->pluck('name', 'id'))
                                ->nullable(),
                            Forms\Components\Select::make('nationality_id')
                                ->label("Nationality")
                                ->required()
                                ->options(Country::all()->pluck('nationality', 'id'))
                                ->nullable(),
                            Forms\Components\Select::make('nationality2_id')
                                ->label("Nationality 2")
                                ->options(Country::all()->pluck('nationality', 'id'))
                                ->nullable(),
                            Forms\Components\Textarea::make('bio')
                                ->placeholder('Bio')
                                ->nullable(),
                            Forms\Components\Select::make('interests')
                                ->label('Interests')
                                ->relationship('interests', 'name')
                                ->multiple()
                                ->options(Interest::all()->pluck('name', 'id'))
                                ->maxItems(3)
                                ->columnSpan(2)
                                ->required()
                                ->searchable(),
                            Forms\Components\Section::make('')->schema([
                                Forms\Components\Toggle::make('compensation')
                                    ->default(false),
                                Forms\Components\Toggle::make('communication')
                                    ->default(false),
                            ])->columns(4),
                            Forms\Components\Section::make('')->schema([
                                Forms\Components\Repeater::make('user_languages')
                                    ->relationship('languages')
                                    ->schema([
                                        Forms\Components\Select::make('language_id')
                                            ->label('Language')
                                            ->relationship('language', 'name')
                                            ->required(),
                                        Forms\Components\Select::make('written_proficiency_id')
                                            ->label('Written Proficiency')
                                            ->relationship('writtenProficiency', 'name')
                                            ->required(),
                                        Forms\Components\Select::make('spoken_proficiency_id')
                                            ->label('Spoken Proficiency')
                                            ->relationship('spokenProficiency', 'name')
                                            ->required(),
                                    ])
                                    ->extraAttributes(['class' => 'industry-repeater'])
                                    ->itemLabel('Language')
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ])->columns(4),
                        ])->columns(4),
                    Forms\Components\Wizard\Step::make('Industries')
                        ->schema([
                            Forms\Components\Grid::make([
                                'default' => 1
                            ])->schema([
                                Forms\Components\Repeater::make('userIndustries') // Relation name
                                ->relationship('userIndustries') // Assuming you have defined the relationship
                                ->schema([
                                    Forms\Components\Select::make('industry_id')
                                        ->label("Industry")
                                        ->options(Industry::all()->pluck('name', 'id'))
                                        ->required(),
                                    Forms\Components\TextInput::make('years')
                                        ->placeholder('Years')
                                        ->numeric()
                                        ->required(),
                                    Forms\Components\Select::make('skill_ids')
                                        ->label("Skills")
                                        ->multiple()
                                        ->columnSpanFull()
                                        ->options(Skill::all()->pluck('name', 'id'))
                                        ->required(),
                                ])->extraAttributes(['class' => 'industry-repeater'])
                                    ->collapsible()
                                    ->columns(2)
                                    ->label('Industries & Skills'),
                            ])->extraAttributes(['class' => 'industry-repeater-grid']),
                        ]),
                    Forms\Components\Wizard\Step::make('Professional Experience')
                        ->schema([
                            Forms\Components\Repeater::make('professionalExperiences') // Relation name
                            ->label("Professional Experience")
                                ->relationship('professionalExperiences') // Assuming you have defined the relationship
                                ->schema([
                                    ...FormUtility::ProfersionalExperience()
                                ])
                                ->itemLabel("Professional Experience")
                                ->label(''),
                        ]),
                    Forms\Components\Wizard\Step::make('Board Experience')
                        ->schema([
                            Forms\Components\Repeater::make('boardExperiences') // Relation name
                            ->relationship('boardExperiences') // Assuming you have defined the relationship
                            ->schema([
                                Forms\Components\Split::make([
                                    Forms\Components\Section::make('')
                                        ->schema([
                                            Forms\Components\Select::make('position_id')
                                                ->label('Board Position')
                                                ->relationship('position', 'title')
                                                ->options(function () {
                                                    return BoardPosition::pluck('title', 'id');
                                                })
                                                ->searchable()
                                                ->required(),
                                            Forms\Components\TextInput::make('organization')
                                                ->placeholder('Organization')
                                                ->label('Organization')
                                                ->required()
                                                ->maxLength(255),
                                            Forms\Components\TextInput::make('location')
                                                ->placeholder('Location')
                                                ->label('Location')
                                                ->maxLength(255),
                                            Forms\Components\DatePicker::make('start_date')
                                                ->label('Start Date')
                                                ->required(),
                                            Forms\Components\DatePicker::make('end_date')
                                                ->label('End Date')
                                                ->nullable(),
                                            Forms\Components\TextInput::make('website')
                                                ->placeholder('Website')
                                                ->label('Website')
                                                ->nullable()
                                                ->maxLength(255),
                                            Forms\Components\Select::make('committee_ids')
                                                ->label("Committees Joined")
                                                ->multiple()
                                                ->columnSpanFull()
                                                ->options(Committee::pluck('name', 'id'))
                                                ->required(),
                                        ])->columns(2),
                                    Forms\Components\Section::make('')
                                        ->schema([
                                            Forms\Components\RichEditor::make('description')
                                                ->label('Description')
                                                ->columnSpan(2)
                                                ->nullable(),
                                            Forms\Components\Toggle::make('non_profit')
                                                ->label('Non-Profit')
                                                ->default(false),
                                            Forms\Components\Toggle::make('publicly_listed')
                                                ->label('Publicly Listed')
                                                ->default(false),
                                            Forms\Components\Toggle::make('paid_appointment')
                                                ->label('Paid Appointment')
                                                ->default(false),
                                        ]),
                                ]),
                            ])->label('')
                                ->itemLabel('Board Experience'),
                        ]),
                ])->skippable()
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
