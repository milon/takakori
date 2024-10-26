<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\GoalResource\Forms\GoalForm;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class GoalsRelationManager extends RelationManager
{
    protected static string $relationship = 'goals';

    public function form(Form $form): Form
    {
        return $form
            ->schema(GoalForm::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('currency.code'),
                MoneyColumn::make('target_amount'),
                MoneyColumn::make('current_amount'),
                Tables\Columns\TextColumn::make('deadline'),
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
