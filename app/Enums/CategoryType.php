<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum CategoryType: string implements HasColor, HasLabel
{
    case Income = 'income';
    case Expense = 'expense';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Income => 'Income',
            self::Expense => 'Expense',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Income => 'success',
            self::Expense => 'danger',
        };
    }
}
