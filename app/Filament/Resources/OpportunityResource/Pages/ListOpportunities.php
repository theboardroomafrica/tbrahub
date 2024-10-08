<?php

namespace App\Filament\Resources\OpportunityResource\Pages;

use App\Filament\Resources\OpportunityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpportunities extends ListRecords
{
    protected static string $resource = OpportunityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     $tabs = ['All Stages' => Tab::make()];
    //
    //     foreach (OpportunityStage::all() as $stage) {
    //         $tabs[$stage->name] = Tab::make()
    //             ->modifyQueryUsing(fn(Builder $query) => $query->where('stage_id', $stage->id));
    //     }
    //     return $tabs;
    // }
}
