<?php

namespace App\Filament\Utilities;

use App\Models\BoardPosition;
use App\Models\Committee;
use Filament\Forms;

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
        ];
    }
}
