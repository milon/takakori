<?php

namespace App\Filament\Resources;

use App\Enums\AccountType;
use App\Filament\Resources\AccountResource\Forms\AccountForm;
use App\Filament\Resources\AccountResource\Pages;
use App\Filament\Resources\AccountResource\RelationManagers\RecurringTransactionsRelationManager;
use App\Filament\Resources\AccountResource\RelationManagers\TransactionsRelationManager;
use App\Models\Account;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Pelmered\FilamentMoneyField\Infolists\Components\MoneyEntry;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'fas-wallet';

    protected static ?string $navigationGroup = 'Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(AccountForm::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institute')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge(),
                Tables\Columns\TextColumn::make('currency.code')
                    ->sortable(),
                MoneyColumn::make('balance')
                    ->sortable(),
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
                SelectFilter::make('type')->options(AccountType::class),
                SelectFilter::make('Currency')->relationship('currency', 'code')->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Account Details')
                ->columns(2)
                ->schema([
                    TextEntry::make('user.name')->label('User'),
                    TextEntry::make('user.email')->label('Email'),
                    TextEntry::make('currency.code')->label('Currency code'),
                    TextEntry::make('currency.name')->label('Currency name'),
                    TextEntry::make('name')->label('Account name'),
                    TextEntry::make('number')->label('Account number'),
                    TextEntry::make('institute')->label('Bank/Financial institute'),
                    TextEntry::make('type')->label('Account type')->badge(),
                    MoneyEntry::make('balance'),
                    TextEntry::make('created_at')->since(),
                ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            TransactionsRelationManager::class,
            RecurringTransactionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccounts::route('/'),
            'view' => Pages\ViewAccount::route('/{record}'),
            // 'create' => Pages\CreateAccount::route('/create'),
            // 'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'number', 'institute'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        /** @var Account $account */
        $account = $record;

        return sprintf('%s - %s', $account->name, $account->number);
    }
}
