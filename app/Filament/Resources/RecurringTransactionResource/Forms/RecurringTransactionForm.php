<?php

namespace App\Filament\Resources\RecurringTransactionResource\Forms;

use App\Enums\BillingFrequency;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class RecurringTransactionForm
{
    public static function getFrom(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->preload()
                ->required(),
            Select::make('account_id')
                ->relationship('account', 'name')
                ->searchable()
                ->preload()
                ->required(),
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->required(),
            MoneyInput::make('amount')
                ->required(),
            Select::make('frequency')
                ->options(BillingFrequency::class)
                ->required(),
            DatePicker::make('start_date')
                ->native(false)
                ->required(),
            DatePicker::make('end_date')
                ->native(false),
        ];
    }
}
