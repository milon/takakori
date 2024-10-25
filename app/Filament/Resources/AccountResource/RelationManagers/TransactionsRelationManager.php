<?php

namespace App\Filament\Resources\AccountResource\RelationManagers;

use App\Filament\Resources\TransactionResource\Forms\TransactionForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactions';

    public function form(Form $form): Form
    {
        return $form
            ->schema(TransactionForm::getFrom());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('category.name')
            ->columns([
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('currency.code'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('date')->since(),
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
