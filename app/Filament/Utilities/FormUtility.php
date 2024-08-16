<?php

namespace App\Filament\Utilities;

use App\Models\BoardPosition;
use App\Models\Committee;
use Filament\Forms;
use Illuminate\Validation\Rule;

class FormUtility
{
    public static function ProfersionalExperience()
    {
        return [
            Forms\Components\Split::make([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('position')
                            ->placeholder('Position')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('organization')
                            ->placeholder('Organization')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->placeholder('Location')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->nullable(),
                    ])->columns(2),
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'link',
                            ])
                            ->columnSpan(2)
                            ->nullable(),
                    ]),
            ]),
        ];
    }

    public static function BoardExperience()
    {
        return [
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
                        Forms\Components\Repeater::make('boardExperienceCommittees')
                            ->relationship('boardExperienceCommittees')
                            ->schema([
                                Forms\Components\Select::make('committee_id')
                                    // ->relationship('committees', 'name')
                                    ->label('Committee')
                                    ->options(function () {
                                        return Committee::pluck('name', 'id');
                                    })
                                    ->required(),
                                Forms\Components\Select::make('chair')
                                    ->label('Role')
                                    ->options([
                                        true => 'Chair',
                                        false => 'Member',
                                    ])
                                    ->pivotData([
                                        'chair' => true
                                    ])
                                    ->required()
                            ])->columnSpan(2)
                            ->columns(2),
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
        ];
    }

    public static function achievements()
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required(),
            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required(),
            Forms\Components\DatePicker::make('date')
                ->required()
        ];
    }

    public static function Languages()
    {
        return [
            Forms\Components\Select::make('language_id')
                ->label('Language')
                ->relationship('language', 'name')
                ->validationMessages([
                    'unique' => 'You have already selected this language.',
                ])
                ->rule(
                    Rule::unique('user_languages', 'language_id')
                        ->where('user_id', auth()->id())
                )
                ->required(),
            Forms\Components\Select::make('written_proficiency_id')
                ->label('Written Proficiency')
                ->relationship('writtenProficiency', 'name')
                ->required(),
            Forms\Components\Select::make('spoken_proficiency_id')
                ->label('Spoken Proficiency')
                ->relationship('spokenProficiency', 'name')
                ->required(),
        ];
    }

    public static function Recognitions()
    {
        return [
            Forms\Components\TextInput::make('award')
                ->label('Award')
                ->required(),
            Forms\Components\TextInput::make('organization')
                ->label('Organization')
                ->required(),
            Forms\Components\TextInput::make('year')
                ->type('year')
                ->required(),
        ];
    }
}
