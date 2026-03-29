<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AdminStatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon  = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Beranda';
    protected static ?string $title           = 'Beranda Admin';
    protected static ?int    $navigationSort  = -1;

    public function getWidgets(): array
    {
        return [
            AdminStatsOverview::class,
        ];
    }

    public function getColumns(): int|string|array
    {
        return 2;
    }
}
