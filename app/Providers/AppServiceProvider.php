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
        $this->app->bind('App\Interfaces\RoleInterface', 'App\Repositories\RoleRepository');
        $this->app->bind('App\Interfaces\UserInterface', 'App\Repositories\UserRepository');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
