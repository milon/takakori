<?php

namespace App\Filament\Resources\AccountResource\Forms;

use App\Enums\AccountType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class AccountForm
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
            TextInput::make('number')
                ->required(),
            TextInput::make('institute')
                ->required(),
            ToggleButtons::make('type')
                ->options(AccountType::class)
                ->inline()
                ->required(),
            MoneyInput::make('balance')
                ->required(),
        ];
    }
}
