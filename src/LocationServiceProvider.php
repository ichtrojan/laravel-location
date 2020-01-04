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
        $this->app->make('Ichtrojan\Location\Seeds\LocationDatabaseSeeder');
        $this->mergeConfigFrom(__DIR__ . "/../publishable/config/location.php", 'laravel-location');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishConfigs();
        }
    }

    protected function publishConfigs()
    {
        $this->publishes([
            __DIR__ . "/../publishable/config/location.php" => config_path('location.php'),
        ], 'laravel-location');
    }
}
