<?php

namespace App\Filament\Resources\InvestmentResource\Forms;

use App\Enums\InvestmentType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class InvestmentForm
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
                ->options(InvestmentType::class)
                ->required(),
            DatePicker::make('purchase_date')
                ->native(false)
                ->required(),
            MoneyInput::make('purchase_price')
                ->required()
                ->numeric(),
            MoneyInput::make('current_price')
                ->required()
                ->numeric(),
            TextInput::make('quantity')
                ->required()
                ->numeric(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->required(),
        ];
    }
}
