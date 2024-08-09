<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Members', User::count()),
            Stat::make('Male Members', User::where('gender_id', 1)->count()),
            Stat::make('Female Members', User::where('gender_id', 2)->count()),
            Stat::make('New Members This Month', User::whereMonth('created_at', now()->month)->count()),
        ];
    }
}
