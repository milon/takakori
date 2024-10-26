<?php

use App\Models\Investment;

function get_default_avatar(string $name): string
{
    return 'https://ui-avatars.com/api/?background=black&color=ffffff&name=' . urlencode($name);
}

function getInvestmentPerformanceIcon(Investment $record): string
{
    if ($record->performance > 0) {
        return 'fas-arrow-trend-up';
    }

    if ($record->performance == 0) {
        return 'fas-arrow-right-long';
    }

    return 'fas-arrow-trend-down';
}
