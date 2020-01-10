<?php

namespace Ichtrojan\Location\Seeds;

use CountriesTableSeeder;
use Illuminate\Database\Seeder;
use StateCityCountrySeeder;
use StatesTableSeeder;
use CitiesTableSeeder;

class LocationDatabaseSeeder extends Seeder
{
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
        $this->call(StateCityCountrySeeder::class);
    }
}
