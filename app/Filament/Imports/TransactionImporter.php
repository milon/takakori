<?php

namespace App\Filament\Imports;

use App\Models\Transaction;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class TransactionImporter extends Importer
{
    protected static ?string $model = Transaction::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('user')
                ->requiredMapping()
                ->relationship(resolveUsing: 'email')
                ->helperText('User email address')
                ->examples(['admin@takakori.app', 'admin@takakori.app'])
                ->rules(['required']),
            ImportColumn::make('account')
                ->requiredMapping()
                ->helperText('Account number')
                ->examples(['42345434', '98674533'])
                ->relationship(resolveUsing: 'number')
                ->rules(['required']),
            ImportColumn::make('category')
                ->requiredMapping()
                ->helperText('Category name')
                ->examples(['Groceries', 'Rent'])
                ->relationship(resolveUsing: 'name')
                ->rules(['required']),
            ImportColumn::make('currency')
                ->requiredMapping()
                ->helperText('Uppercase 3 letter currency code (ISO 4217)')
                ->examples(['CAD', 'USD'])
                ->relationship(resolveUsing: 'code')
                ->rules(['required']),
            ImportColumn::make('amount')
                ->requiredMapping()
                ->numeric()
                ->helperText('Amount in cents')
                ->examples(['144', '2500'])
                ->rules(['required', 'integer']),
            ImportColumn::make('date')
                ->requiredMapping()
                ->helperText('Date format: Y-m-d H:i:s')
                ->examples(['2023-09-10 14:20:39', '2024-10-12 11:20:00'])
                ->rules(['required', 'date_format:Y-m-d H:i:s']),
            ImportColumn::make('description')
                ->requiredMapping()
                ->helperText('Description of the transaction')
                ->examples(['Sample transaction description 1', 'Sample transaction description 2'])
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Transaction
    {
        // return Transaction::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Transaction();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your transaction import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
