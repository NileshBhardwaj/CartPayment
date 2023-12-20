<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetAllRegisteredUser extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(GetUserService::class, function ($app) {
            return new GetUserService();
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
