<?php

namespace App\Filament\Utilities;

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
}
