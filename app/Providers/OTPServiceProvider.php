<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OTPService;

class OTPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(OTPService::class, function ($app) {
            return new OTPService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Code to run during service booting (if needed)
    }
}
