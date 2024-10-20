<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillReminderResource\Pages;
use App\Models\BillReminder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BillReminderResource extends Resource
{
    protected static ?string $model = BillReminder::class;

    protected static ?string $navigationIcon = 'fas-receipt';

    protected static ?string $navigationGroup = 'Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'create' => Pages\CreateBillReminder::route('/create'),
            'edit' => Pages\EditBillReminder::route('/{record}/edit'),
        ];
    }
}
