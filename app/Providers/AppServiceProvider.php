<?php

namespace App\Providers;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\CreateAction as TableCreateAction;
use Filament\Tables\Actions\EditAction as TableEditAction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CreateAction::configureUsing(fn (CreateAction $action) => $action->slideOver());
        EditAction::configureUsing(fn (EditAction $action) => $action->slideOver());

        TableCreateAction::configureUsing(fn (TableCreateAction $action) => $action->slideOver());
        TableEditAction::configureUsing(fn (TableEditAction $action) => $action->slideOver());

        DatePicker::configureUsing(fn (DatePicker $datePicker) => $datePicker->native(false));
        DateTimePicker::configureUsing(fn (DateTimePicker $dateTimePicker) => $dateTimePicker->native(false));
        Toggle::configureUsing(fn (Toggle $toggle) => $toggle->inline(false));
    }
}
