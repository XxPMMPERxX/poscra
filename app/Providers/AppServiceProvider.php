<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentView::registerRenderHook(
            'panels::head.end',
            fn (): string => Blade::render('@vite([\'resources/css/app.css\', \'resources/js/app.js\'])'),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
	    if (env('APP_ENV', 'production') === 'production') {
		    \URL::forceScheme('https');
	    }
    }
}
