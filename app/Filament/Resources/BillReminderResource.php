<?php

namespace App\Filament\Resources;

use App\Enums\BillingFrequency;
use App\Filament\Resources\BillReminderResource\Forms\BillReminderForm;
use App\Filament\Resources\BillReminderResource\Pages;
use App\Models\BillReminder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class BillReminderResource extends Resource
{
    protected static ?string $model = BillReminder::class;

    protected static ?string $navigationIcon = 'fas-receipt';

    protected static ?string $navigationGroup = 'Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(BillReminderForm::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency.code'),
                MoneyColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('frequency')
                    ->badge()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('User')->relationship('user', 'name')->preload()->searchable(),
                SelectFilter::make('Category')->relationship('category', 'name')->preload()->searchable(),
                SelectFilter::make('Frequency')->options(BillingFrequency::class),
                SelectFilter::make('Currency')->relationship('currency', 'code')->preload(),
                Filter::make('is_paid')
                    ->label('Show only unpaid bills')
                    ->query(fn (Builder $query): Builder => $query->where('is_paid', false))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBillReminders::route('/'),
            // 'create' => Pages\CreateBillReminder::route('/create'),
            // 'edit' => Pages\EditBillReminder::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return sprintf('%s - %s', $record->name, $record->frequency->value);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'frequency'];
    }
}
