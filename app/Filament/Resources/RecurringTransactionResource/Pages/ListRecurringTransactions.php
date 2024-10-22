<?php

namespace App\Filament\Resources\RecurringTransactionResource\Pages;

use App\Filament\Imports\RecurringTransactionImporter;
use App\Filament\Resources\RecurringTransactionResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListRecurringTransactions extends ListRecords
{
    protected static string $resource = RecurringTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Bulk Import')
                ->chunkSize(50)
                ->importer(RecurringTransactionImporter::class),
        ];
    }
}
