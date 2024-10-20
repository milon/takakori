<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum InvestmentType: string implements HasLabel
{
    case Stocks = 'stocks';
    case Bonds = 'bonds';
    case MitualFunds = 'mitual-funds';
    case RealEstate = 'real-estate';
    case Crypto = 'crypto';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Stocks => 'Stocks',
            self::Bonds => 'Bonds',
            self::MitualFunds => 'Mitual Funds',
            self::RealEstate => 'Real Estate',
            self::Crypto => 'Crypto',
        };
    }
}
