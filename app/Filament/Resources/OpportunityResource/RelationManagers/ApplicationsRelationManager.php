<?php

namespace App\Filament\Resources\OpportunityResource\RelationManagers;

use App\Models\OpportunityStage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationsRelationManager extends RelationManager
{
    protected static string $relationship = 'applications';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('opportunity')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('opportunity')
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('user.currentProfessionalExperience.position')
                    ->label("Current Title"),
                Tables\Columns\TextColumn::make('user.currentProfessionalExperience.organization')
                    ->label("Current Organisation"),
                Tables\Columns\TextColumn::make('stage.name')
                    ->label("Current Stage"),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function getTabs(): array
    {
        $tabs = ['All Stages' => Tab::make()];

        foreach (OpportunityStage::all() as $stage) {
            $tabs[$stage->name] = Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('stage_id', $stage->id));
        }
        return $tabs;
    }
}
