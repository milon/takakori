<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum InvestmentType: string implements HasColor, HasLabel
{
    case Stocks = 'stocks';
    case Bonds = 'bonds';
    case MitualFunds = 'mitual-funds';
    case RealEstate = 'real-estate';
    case Crypto = 'crypto';

    public function getLabel(): string
    {
        return str($this->value)->headline();
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Stocks => '#eb4034',
            self::Bonds => '#76c720',
            self::MitualFunds => '#20c7bf',
            self::RealEstate => '#7920c7',
            self::Crypto => '#c7206e',
        };
    }
}
