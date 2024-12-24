<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AccountType: string implements HasColor, HasLabel
{
    case Savings = 'savings';
    case Checking = 'checking';
    case CreditCard = 'credit-card';

    public function getLabel(): ?string
    {
        return str($this->value)->headline();
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Savings => 'success',
            self::Checking => 'info',
            self::CreditCard => 'warning',
        };
    }
}
