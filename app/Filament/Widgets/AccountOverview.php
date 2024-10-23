<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\Models\Debt;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;

class AccountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number of Accounts', Account::count()),
            Stat::make('Total Asset', Account::query()->get()->sum('balance')),
            Stat::make('Total Debt', Debt::query()->get()->sum('current_balance')),
        ];
    }
}
