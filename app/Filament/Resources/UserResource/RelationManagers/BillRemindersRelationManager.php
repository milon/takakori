<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\BillReminderResource\Forms\BillReminderForm;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class BillRemindersRelationManager extends RelationManager
{
    protected static string $relationship = 'billReminders';

    public function form(Form $form): Form
    {
        return $form
            ->schema(BillReminderForm::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('currency.code'),
                MoneyColumn::make('amount'),
                Tables\Columns\TextColumn::make('due_date'),
                Tables\Columns\TextColumn::make('frequency'),
                Tables\Columns\IconColumn::make('is_paid')->boolean(),
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
