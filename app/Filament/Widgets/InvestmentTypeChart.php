<?php

namespace App\Filament\Widgets;

use App\Models\Investment;
use Filament\Widgets\ChartWidget;

class InvestmentTypeChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Investment::query()
            ->selectRaw('sum(current_price) as price, type')
            ->groupBy('type')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Debt by type',
                    'data' => $data->map(fn($data) => $data->price)->all(),
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
