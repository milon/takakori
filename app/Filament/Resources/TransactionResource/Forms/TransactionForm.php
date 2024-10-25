<?php

namespace App\Filament\Resources\TransactionResource\Forms;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class TransactionForm
{
    public static function getFrom(): array
    {
        return [
            Select::make('user_id')
                ->relationship('user', 'name')
                ->preload()
                ->searchable()
                ->required(),
            Select::make('account_id')
                ->relationship('account', 'name')
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
                ->required(),
            MoneyInput::make('amount')
                ->required()
                ->numeric(),
            DateTimePicker::make('date')
                ->native(false)
                ->required(),
            MarkdownEditor::make('description')
                ->columnSpanFull(),
            Select::make('tags')
                ->relationship('tags', 'name')
                ->preload()
                ->searchable()
                ->multiple()
                ->columnSpanFull(),
        ];
    }
}
