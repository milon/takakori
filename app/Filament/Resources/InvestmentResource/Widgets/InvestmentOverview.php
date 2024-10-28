<?php

namespace App\Filament\Resources\InvestmentResource\Widgets;

use App\Models\Investment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InvestmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total investments', formatMoney(Investment::query()->get()->sum('marketValue')))
                ->icon('fas-money-bills')
                ->description('Marketvalue of total investments'),
            Stat::make('Positive Performer', Investment::query()->whereColumn('current_price', '>', 'purchase_price')->count())
                ->icon('fas-arrow-trend-up')
                ->description('Investments that are growing positively'),
            Stat::make('Negative Performer', Investment::query()->whereColumn('current_price', '<', 'purchase_price')->count())
                ->icon('fas-arrow-trend-down')
                ->description('Investments that are growing negatively'),
        ];
    }
}
