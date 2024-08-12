<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         UserResource\Widgets\UsersOverview::class
    //     ];
    // }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'male' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('gender_id', 1)),
            'female' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('gender_id', 2)),
        ];
    }
}
