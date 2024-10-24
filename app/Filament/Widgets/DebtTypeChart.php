<?php

namespace App\Filament\Widgets;

use App\Models\Debt;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class DebtTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Debt by type';

    // protected static string $color = 'info';

    protected function getData(): array
    {
        $data = Debt::query()
            ->selectRaw('sum(current_balance) as balance, type')
            ->groupBy('type')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Debt by type',
                    'data' => $data->map(fn($data) => abs($data->balance))->all(),
                    'backgroundColor' => $data->map(fn($data) => $data->type->getColor())->all()
                ],
            ],
            'labels' => $data->map(fn($data) => $data->type->getLabel())->all(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
