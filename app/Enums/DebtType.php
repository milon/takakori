<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum DebtType: string implements HasColor, HasIcon, HasLabel
{
    case PersonalLoan = 'personal-loan';
    case Mortgage = 'mortgage';
    case CreditCard = 'credit-card';
    case AutoLoan = 'auto-loan';
    case Other = 'other';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PersonalLoan => 'Personal Loan',
            self::Mortgage => 'Mortgage',
            self::CreditCard => 'Credit Card',
            self::AutoLoan => 'Auto Loan',
            self::Other => 'Other',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PersonalLoan => 'fas-sack-dollar',
            self::Mortgage => 'fas-house-chimney',
            self::CreditCard => 'fas-credit-card',
            self::AutoLoan => 'fas-car-rear',
            self::Other => 'fas-money-check-dollar',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PersonalLoan => '#eb4034',
            self::Mortgage => '#76c720',
            self::CreditCard => '#20c7bf',
            self::AutoLoan => '#7920c7',
            self::Other => '#c7206e',
        };
    }
}
