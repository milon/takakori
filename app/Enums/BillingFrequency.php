<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum BillingFrequency: string implements HasLabel
{
    case Daily = 'daily';
    case Weekly = 'weekly';
    case BiWeekly = 'bi-weekly';
    case Monthly = 'monthly';
    case Quarterly = 'quarterly';
    case SemiAnnually = 'semi-annually';
    case Annually = 'annually';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Daily => 'Daily',
            self::Weekly => 'Weekly',
            self::BiWeekly => 'Bi-Weekly',
            self::Monthly => 'Monthly',
            self::Quarterly => 'Quarterly',
            self::SemiAnnually => 'Semi-Annually',
            self::Annually => 'Annually',
        };
    }
}
