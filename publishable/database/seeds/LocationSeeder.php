<?php

use Illuminate\Database\Seeder;
use Ichtrojan\Location\Traits\Seedable;

class LocationSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
    }
}
