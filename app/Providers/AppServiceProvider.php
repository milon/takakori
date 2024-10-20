<?php

namespace App\Providers;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
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
        CreateAction::configureUsing(fn ($action) => $action->slideOver());
        EditAction::configureUsing(fn ($action) => $action->slideOver());

        TableCreateAction::configureUsing(fn ($action) => $action->slideOver());
        TableEditAction::configureUsing(fn ($action) => $action->slideOver());
    }
}
