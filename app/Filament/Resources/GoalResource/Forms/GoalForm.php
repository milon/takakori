<?php

namespace App\Filament\Resources\GoalResource\Forms;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class GoalForm
{
    public static function getForm(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->preload()
                ->searchable()
                ->required(),
            Select::make('currency_id')
                ->relationship('currency', 'name')
                ->required(),
            TextInput::make('name')
                ->required(),
            MoneyInput::make('target_amount')
                ->required(),
            MoneyInput::make('current_amount')
                ->required(),
            DatePicker::make('deadline')
                ->native(false)
                ->required(),
        ];
    }
}
