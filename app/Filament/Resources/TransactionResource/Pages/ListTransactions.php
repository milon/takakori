<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Enums\CategoryType;
use App\Filament\Imports\TransactionImporter;
use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use App\Models\Transaction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->after(function (Model $record, array $data) {
                /** @var Transaction $record */
                $account = $record->account;
                $categoryType = $record->category->type;

                ($categoryType === CategoryType::Income) ?
                    $account->increment('balance', $data['amount']) :
                    $account->decrement('balance', $data['amount']);
                $account->save();
            }),
            ImportAction::make()
                ->label('Bulk Import')
                ->chunkSize(50)
                ->importer(TransactionImporter::class),
        ];
    }
}
