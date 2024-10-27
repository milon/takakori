<?php

namespace App\Filament\Resources\InvestmentResource\Widgets;

use App\Models\Investment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Money\Money;
use Pelmered\FilamentMoneyField\Infolists\Components\MoneyEntry;

class InvestmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total investments', formatMoney(Investment::query()->get()->sum('marketValue')))
                ->icon('fas-money-bills'),
            Stat::make('Positive Performer', Investment::query()->whereColumn('current_price', '>', 'purchase_price')->count())
                ->icon('fas-arrow-trend-up'),
            Stat::make('Negative Performer', Investment::query()->whereColumn('current_price', '<', 'purchase_price')->count())
                ->icon('fas-arrow-trend-down'),
        ];
    }
}
