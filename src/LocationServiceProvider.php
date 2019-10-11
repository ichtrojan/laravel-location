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

        $this->mergeConfigFrom(__DIR__ . "/../publishable/config/laravel-location.php", 'laravel-location');
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
            $this->publishMigrations();
            $this->publishConfigs();
            $this->registerPublishableResources();
        }
    }

    /**
     * Register the publishable files.
     */
    private function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__).'/publishable';

        $publishable = [
            'laravel-location-seeds' => [
                "{$publishablePath}/database/seeds/" => database_path('seeds'),
            ]
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__ . "/database/migrations/2019_05_11_000000_create_cities_table.php" => database_path('migrations/' . date("Y_m_d_His", time()) . '_create_cities_table.php'),
            __DIR__ . "/database/migrations/2019_05_11_000000_create_countries_table.php" => database_path('migrations/' . date("Y_m_d_His", time()) . '_create_countries_table.php'),
            __DIR__ . "/database/migrations/2019_05_11_000000_create_states_table.php" => database_path('migrations/' . date("Y_m_d_His", time()) . '_create_states_table.php')
        ], 'laravel-location-migrations');
    }

    protected function publishConfigs()
    {
        $this->publishes([
            __DIR__ . "/../publishable/config/laravel-location.php" => config_path('laravel-location.php'),
        ], 'laravel-location-config');
    }
}
