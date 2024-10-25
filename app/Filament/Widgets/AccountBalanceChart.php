<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\Models\Debt;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AccountBalanceChart extends ChartWidget
{
    protected static ?string $heading = 'Account Balance Per Month';

    protected int | string | array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $accountBalance = Trend::model(Account::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('balance');

        $debtBalance = Trend::model(Debt::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->dateColumn('due_date')
            ->perMonth()
            ->sum('current_balance');

        return [
            'datasets' => [
                [
                    'label' => 'Account Balance',
                    'data' => $accountBalance->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#09ed0d',
                    'borderColor' => '#0d4f0e',
                ],
                [
                    'label' => 'Debt Balance',
                    'data' => $debtBalance->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#fa594d',
                    'borderColor' => '#c2160a',
                ],
            ],
            'labels' => $accountBalance->map(fn (TrendValue $value) => Carbon::createFromFormat('Y-m', $value->date)->format('M, Y')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
