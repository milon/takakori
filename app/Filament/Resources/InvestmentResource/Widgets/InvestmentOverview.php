<?php

namespace App\Filament\Resources\InvestmentResource\Widgets;

use App\Models\Investment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Concurrency;

class InvestmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        [$totalInvestments, $positive, $negative] = Concurrency::run([
            fn() => Investment::query()->get()->sum('marketValue'),
            fn() => Investment::query()->whereColumn('current_price', '>', 'purchase_price')->count(),
            fn() => Investment::query()->whereColumn('current_price', '<', 'purchase_price')->count(),
        ]);

        return [
            Stat::make('Total investments', formatMoney($totalInvestments))
                ->icon('fas-money-bills')
                ->description('Marketvalue of total investments'),
            Stat::make('Positive Performer', $positive)
                ->icon('fas-arrow-trend-up')
                ->description('Investments that are growing positively'),
            Stat::make('Negative Performer', $negative)
                ->icon('fas-arrow-trend-down')
                ->description('Investments that are growing negatively'),
        ];
    }
}
