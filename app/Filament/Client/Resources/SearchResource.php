<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\SearchMemberResource\Pages\ListSearchMembers;
use App\Filament\Client\Resources\SearchResource\Pages;
use App\Filament\Client\Resources\SearchResource\RelationManagers;
use App\Models\Opportunity;
use App\Models\OpportunityType;
use App\Models\RevenueCategory;
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
                    ->label('Opportunity title')
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
                Forms\Components\Hidden::make('client_id')
                    ->default(request()->user('client')->id),
                Forms\Components\Select::make('revenue_id')
                    ->label("Revenue")
                    ->required()
                    ->options(RevenueCategory::pluck('name', 'id')),
                Forms\Components\Select::make('type_id')
                    ->label("Opportunity type")
                    ->required()
                    ->options(OpportunityType::pluck('name', 'id')),
                Forms\Components\Toggle::make('isOpen')
                    ->label('Public')
                    ->onColor('success')    // Optional: Sets the color when "on"
                    ->offColor('danger')    // Optional: Sets the color when "off"
                    ->inline(false)         // Optional: Sets the toggle alignment (use `true` for inline)
                    ->default(false),
                Forms\Components\RichEditor::make('info')
                    ->columnSpanFull(),
            ])->columns(3);
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
                Tables\Columns\ToggleColumn::make('isOpen')
                    ->label('Public')
                    ->onColor('success')    // Optional: Color when toggled on
                    ->sortable()            // Allows sorting based on the boolean field
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(fn($record) => route('filament.client.resources.searches.connections', ['parent' => $record]))
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
            'view' => Pages\ViewSearch::route('/{record}'),
            'connections' => ListSearchMembers::route('/{parent}/connections'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $client = request()->user('client');
        return $client ? parent::getEloquentQuery()->where("client_id", $client->id) : parent::getEloquentQuery();
    }
}
