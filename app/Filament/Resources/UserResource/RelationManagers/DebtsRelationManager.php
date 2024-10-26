<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\DebtResource\Forms\DebtForm;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class DebtsRelationManager extends RelationManager
{
    protected static string $relationship = 'debts';

    public function form(Form $form): Form
    {
        return $form
            ->schema(DebtForm::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('currency.code'),
                Tables\Columns\TextColumn::make('interest_rate')->suffix('%'),
                MoneyColumn::make('initial_amount'),
                MoneyColumn::make('current_balance'),
                MoneyColumn::make('minimum_pay'),
                Tables\Columns\TextColumn::make('due_date'),
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
