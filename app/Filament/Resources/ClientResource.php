<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->label('First Name'),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->label('Last Name'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->label('Email'),
                        Forms\Components\TextInput::make('phone_number')
                            ->required()
                            ->label('Phone Number'),
                        Forms\Components\TextInput::make('company')
                            ->label('Current company'),
                        Forms\Components\TextInput::make('role')
                            ->label('Current role / Title *'),
                        Forms\Components\Select::make('growth_stage_id')
                            ->relationship('growthStage', 'name')
                            ->label('Company growth stage *'),
                        Forms\Components\Checkbox::make('is_founder')
                            ->label('Are you a founder?')
                            ->default(false),
                        Forms\Components\Checkbox::make('has_board_experience')
                            ->label('Have Board Experience?')
                            ->default(false),
                    ])->columns(3),
                Forms\Components\TextInput::make('direct_reports')
                    ->numeric()
                    ->label('Number of direct reports'),
                Forms\Components\TextInput::make('indirect_reports')
                    ->numeric()
                    ->label('Number of indirect reports'),
                Forms\Components\TextInput::make('linkedin_url')
                    ->url()
                    ->label('LinkedIn URL'),
                Forms\Components\Select::make('nationality_id')
                    ->label("Nationality")
                    ->required()
                    ->options(Country::all()->pluck('nationality', 'id')),
                Forms\Components\Select::make('other_nationality_id')
                    ->label("Other nationality")
                    ->options(Country::all()->pluck('nationality', 'id')),
                Forms\Components\Textarea::make('bio')
                    ->rows(3)
                    ->columnSpan(2),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company')
                    ->label('Company'),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('First Name'),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Last Name'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number'),
                // Tables\Columns\TextColumn::make('role')
                //     ->label('Role'),
                // Tables\Columns\TextColumn::make('growth_stage')
                //     ->label('Growth Stage'),
                // Tables\Columns\BooleanColumn::make('isApproved')
                //     ->label('Approved')
                //     ->trueColor('success')  // Customize the color if needed
                //     ->falseColor('danger'),  // Customize the color if needed
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
