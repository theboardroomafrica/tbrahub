<?php

namespace App\Filament\Client\Resources\SearchResource\Pages;

use App\Filament\Client\Resources\SearchResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSearch extends CreateRecord
{
    protected static string $resource = SearchResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
