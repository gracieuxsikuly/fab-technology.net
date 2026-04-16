<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

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
        // Set the default string length for the database schema
        Schema::defaultStringLength(191);

        // Share SiteSetting with all views
        // This makes $siteSetting available in EVERY view automatically
        View::composer('*', function ($view) {
            try {
                $siteSetting = SiteSetting::getSetting();
                $view->with('siteSetting', $siteSetting);
            } catch (\Exception $e) {
                // Silent fail during migrations or if table doesn't exist
            }
        });
    }
}
