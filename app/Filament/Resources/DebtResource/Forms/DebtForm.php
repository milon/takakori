<?php

namespace App\Filament\Resources\DebtResource\Forms;

use App\Enums\DebtType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class DebtForm
{
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->preload()
                ->searchable()
                ->required(),
            TextInput::make('name')
                ->required(),
            Select::make('type')
                ->options(DebtType::class)
                ->required(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->required(),
            TextInput::make('interest_rate')
                ->suffix('%')
                ->required()
                ->numeric(),
            MoneyInput::make('initial_amount')
                ->required()
                ->numeric(),
            MoneyInput::make('current_balance')
                ->required()
                ->numeric(),
            MoneyInput::make('min_payment')
                ->required()
                ->numeric(),
            DatePicker::make('due_date')
                ->native(false)
                ->required(),
        ];
    }
}
