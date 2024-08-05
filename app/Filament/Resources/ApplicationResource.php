<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status'),
                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                // Forms\Components\Textarea::make('jsonContent')
                //     ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Tables\Columns\IconColumn::make('status')
                //     ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => statusInfo($state))
                    ->default('Pending')
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => statusColors($state)),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->infolist([
                        ViewEntry::make('content')
                            ->view('filament.infolists.entries.jsonDisplay'),
                        Section::make('')
                            ->schema([
                                TextEntry::make("statusText")
                                    ->label("Status"),
                                Actions::make([
                                    Actions\Action::make('approve')
                                        ->color('success')
                                        ->disabled(fn(Application $record) => $record->status === 1)
                                        ->action(fn(Application $record) => $record->approve()),
                                    Actions\Action::make('reject')
                                        ->color('danger')
                                        ->disabled(fn(Application $record) => $record->status === 0)
                                        ->action(fn(Application $record) => $record->reject()),
                                    Actions\Action::make('Make pending')
                                        ->color('gray')
                                        ->disabled(fn(Application $record) => is_null($record->status))
                                        ->action(fn(Application $record) => $record->markAsPending()),
                                ])
                            ])
                    ])
                    ->slideOver(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageApplications::route('/'),
        ];
    }
}
