<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Imports\TransactionImporter;
use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->label('Bulk Import')
                ->chunkSize(50)
                ->importer(TransactionImporter::class),
        ];
    }
}
