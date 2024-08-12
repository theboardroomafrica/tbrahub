<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
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
                Forms\Components\TextInput::make('first_name')
                    ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('email2')
                    ->email(),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required(),
                Forms\Components\Select::make('gender_id')
                    ->label("Gender")
                    ->required()
                    ->options(Gender::all()->pluck('name', 'id'))
                    ->nullable(),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->tel(),
                Forms\Components\TextInput::make('phone_alt')
                    ->tel(),
                Forms\Components\TextInput::make('website')
                    ->url(),
                Forms\Components\TextInput::make('linkedin')
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
                            ->numeric()
                            ->required(),
                        Forms\Components\Select::make('skill_ids')
                            ->label("Skills")
                            ->multiple()
                            ->columnSpanFull()
                            ->options(Skill::all()->pluck('name', 'id'))
                            ->required(),
                    ])->extraAttributes(['class' => 'industry-repeater'])
                        ->columns(2)
                        ->label('Industries & Skills'),
                ])->extraAttributes(['class' => 'industry-repeater-grid']),

            ])->columns(4);
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
