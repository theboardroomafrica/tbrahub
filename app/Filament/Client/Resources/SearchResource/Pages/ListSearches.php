<?php

namespace App\Filament\Client\Resources\SearchResource\Pages;

use App\Filament\Client\Resources\SearchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSearches extends ListRecords
{
    protected static string $resource = SearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
