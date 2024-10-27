<?php

use App\Models\Investment;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

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

function getInvestmentPerformanceColor(Investment $record): string
{
    if ($record->performance > 0) {
        return 'success';
    }

    if ($record->performance == 0) {
        return 'info';
    }

    return 'danger';
}

function formatMoney(int $amount, String $currency = 'USD'): string
{
    $money = new Money($amount, new Currency($currency));
    $currencies = new ISOCurrencies();

    $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
    $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

    return $moneyFormatter->format($money);
}
