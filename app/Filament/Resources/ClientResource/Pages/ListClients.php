<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'approved' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('isApproved', 1)),
            'pending' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('isApproved', 0)),
        ];
    }
}
