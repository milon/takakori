<?php

namespace App\Filament\Resources\BillReminderResource\Forms;

use App\Enums\BillingFrequency;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class BillReminderForm
{
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->preload()
                ->searchable()
                ->required(),
            Select::make('category_id')
                ->relationship('category', 'name')
                ->preload()
                ->searchable()
                ->required(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->preload()
                ->required(),
            TextInput::make('name')
                ->required(),
            MoneyInput::make('amount')
                ->required(),
            DatePicker::make('due_date')
                ->native(false)
                ->required(),
            Select::make('frequency')
                ->options(BillingFrequency::class)
                ->required(),
            Toggle::make('is_paid')
                ->required(),
        ];
    }
}
