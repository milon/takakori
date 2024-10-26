<?php

namespace App\Filament\Resources\AccountResource\RelationManagers;

use App\Filament\Resources\RecurringTransactionResource\Forms\RecurringTransactionForm;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class RecurringTransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'recurringTransactions';

    public function form(Form $form): Form
    {
        return $form
            ->schema(RecurringTransactionForm::getFrom());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('category.name')
            ->columns([
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('currency.code'),
                MoneyColumn::make('amount'),
                Tables\Columns\TextColumn::make('frequency')->badge(),
                Tables\Columns\TextColumn::make('start_date')->since(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
