<?php

namespace Ichtrojan\Location;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ichtrojan\Location\Http\Controllers\LocationController');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }
}
