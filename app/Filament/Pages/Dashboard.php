<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AccountBalanceChart;
use App\Filament\Widgets\AccountOverview;
use App\Filament\Widgets\DebtTypeChart;
use Filament\Pages\Page;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'fas-house';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            AccountOverview::class,
            AccountBalanceChart::class,
            DebtTypeChart::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            AccountWidget::class,
            FilamentInfoWidget::class,
        ];
    }
}
