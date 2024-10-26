<?php

namespace App\Filament\Resources\InvestmentResource\Pages;

use App\Filament\Resources\InvestmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInvestment extends ViewRecord
{
    protected static string $resource = InvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->icon('heroicon-o-pencil-square')
                ->slideOver(),
            Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->icon('heroicon-o-trash'),
        ];
    }
}
