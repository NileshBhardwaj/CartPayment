<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CustomService;
class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() {
        $this->app->singleton(CustomService::class, function ($app) {
            return new CustomService();
        });
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        
    }
}
