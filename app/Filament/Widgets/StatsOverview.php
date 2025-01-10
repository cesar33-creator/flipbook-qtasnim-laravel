<?php

namespace App\Filament\Widgets;

use App\Models\CategoryBook;
use App\Models\UploadBook;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Spatie\Permission\Models\Role;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Category', CategoryBook::count()),
            Stat::make('Total File Book', UploadBook::count()),
            Stat::make('Total Role', Role::count()),
            Stat::make('Total User', User::count()),
        ];
    }
}