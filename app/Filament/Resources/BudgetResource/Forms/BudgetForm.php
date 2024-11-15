<?php

namespace App\Filament\Resources\BudgetResource\Forms;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class BudgetForm
{
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->preload()
                ->required(),
            MoneyInput::make('amount')
                ->required(),
            DatePicker::make('start_date')
                ->required(),
            DatePicker::make('end_date')
                ->required(),
        ];
    }
}
