<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\SearchResource\Pages;
use App\Filament\Client\Resources\SearchResource\RelationManagers;
use App\Models\Opportunity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SearchResource extends Resource
{
    protected static ?string $model = Opportunity::class;

    protected static ?string $label = "Search";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('company')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('employees')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('info')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('revenue_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('type_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('stage_id')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('employees')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('revenue.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stage.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListSearches::route('/'),
            'create' => Pages\CreateSearch::route('/create'),
            'edit' => Pages\EditSearch::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $client = request()->user('client');
        return $client ? parent::getEloquentQuery()->where("client_id", $client->id) : parent::getEloquentQuery();
    }
}
