<?php

namespace App\Filament\Client\Resources\SearchMemberResource\Pages;

use App\Filament\Client\Resources\SearchMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSearchMember extends EditRecord
{
    protected static string $resource = SearchMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
