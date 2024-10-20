<?php

namespace App\Filament\Resources\BillReminderResource\Pages;

use App\Filament\Resources\BillReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillReminders extends ListRecords
{
    protected static string $resource = BillReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
