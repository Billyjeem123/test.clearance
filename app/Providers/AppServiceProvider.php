<?php

namespace App\Providers;

use App\Models\Unit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share user data with all views
        View::composer('*', function ($view) {
            $view->with('units', Unit::all());
        });
    }
}
