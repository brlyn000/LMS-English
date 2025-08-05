<?php

namespace App\Providers;

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
        // Suppress Symfony Console deprecation warnings
        error_reporting(E_ALL & ~E_USER_DEPRECATED);
        
        // Set custom error handler for deprecation warnings
        set_error_handler(function ($severity, $message, $file, $line) {
            if (strpos($message, 'symfony/console') !== false && strpos($message, 'deprecated') !== false) {
                return true; // Suppress Symfony Console deprecation warnings
            }
            return false; // Let other errors be handled normally
        }, E_USER_DEPRECATED);
    }
}