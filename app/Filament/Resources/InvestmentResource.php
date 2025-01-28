<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvestmentResource\Forms\InvestmentForm;
use App\Filament\Resources\InvestmentResource\Pages;
use App\Filament\Resources\InvestmentResource\Widgets\InvestmentOverview;
use App\Models\Investment;
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

class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static ?string $navigationIcon = 'fas-money-bill-trend-up';

    protected static ?string $navigationGroup = 'Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(InvestmentForm::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purchase_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('currency.code')
                    ->numeric()
                    ->sortable(),
                MoneyColumn::make('purchase_price')
                    ->sortable(),
                MoneyColumn::make('current_price')
                    ->sortable(),
                Tables\Columns\TextColumn::make('performance')
                    ->icon(fn (Model $model) => getInvestmentPerformanceIcon($model))
                    ->iconColor(fn (Model $model) => getInvestmentPerformanceColor($model))
                    ->suffix('%'),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                ]),
            Section::make('Investment Details')
                ->columns(2)
                ->schema([
                    TextEntry::make('name')->label('Investment name'),
                    TextEntry::make('type')->label('Investment type'),
                    TextEntry::make('purchase_date')->label('Purchase date'),
                    TextEntry::make('quantity')->label('Quantity'),
                    MoneyEntry::make('purchase_price')->label('Purchase price'),
                    MoneyEntry::make('current_price')->label('Current price'),
                    TextEntry::make('performance')
                        ->label('Performance')
                        ->suffix('%')
                        ->icon(fn (Model $model) => getInvestmentPerformanceIcon($model))
                        ->iconColor(fn (Model $model) => getInvestmentPerformanceColor($model)),
                    MoneyEntry::make('marketValue')->label('Market value'),
                ]),
        ]);
    }

    public static function getWidgets(): array
    {
        return [
            InvestmentOverview::class,
        ];
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
            'index' => Pages\ListInvestments::route('/'),
            'view' => Pages\ViewInvestment::route('/{record}'),
            // 'create' => Pages\CreateInvestment::route('/create'),
            // 'edit' => Pages\EditInvestment::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        /** @var Investment $record */
        return sprintf('%s - %s', $record->name, $record->type->value);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'type'];
    }
}
