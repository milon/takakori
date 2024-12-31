<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\Models\Debt;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Concurrency;

class AccountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        [$numberOfAccounts, $totalAsset, $totalDebt] = Concurrency::run([
            fn () => Account::count(),
            fn () => Account::query()->sum('balance'),
            fn () => Debt::query()->sum('current_balance'),
        ]);

        return [
            Stat::make('Number of Accounts', $numberOfAccounts),
            Stat::make('Total Asset', $totalAsset),
            Stat::make('Total Debt', $totalDebt),
        ];
    }
}
