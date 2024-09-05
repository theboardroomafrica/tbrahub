<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\SearchMemberResource\Pages;
use App\Filament\Client\Resources\SearchMemberResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SearchMemberResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = "Member";

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('name'),
                // Tables\Columns\TextColumn::make('currentProfessionalExperience.position')
                //     ->label("Current Title"),
                // Tables\Columns\TextColumn::make('currentProfessionalExperience.organization')
                //     ->label("Current Organisation"),
                // Tables\Columns\IconColumn::make('opportunityConnections')
                //     ->boolean()
                //     ->getStateUsing(fn($record) => (bool)$record->opportunityConnections->count())
                //     ->label('Contacted')
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
            'index' => Pages\ListSearchMembers::route('/'),
            // 'create' => Pages\CreateSearchMember::route('/create'),
            // 'edit' => Pages\EditSearchMember::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     $pattern = '/\/searches\/([^\/]+)\/members/';
    //     $search_id = null;
    //
    //     if (preg_match($pattern, request()->url(), $matches)) {
    //         $search_id = $matches[1];
    //     }
    //
    //     return parent::getEloquentQuery()->with(['opportunityConnections' => function ($query) use ($search_id) {
    //         $query->where('opportunity_id', $search_id);
    //     }]);
    // }

    public static function canCreate(): bool
    {
        return false;
    }
}
