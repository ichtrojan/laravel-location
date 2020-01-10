<?php

namespace Ichtrojan\Location\Seeds;

use Illuminate\Database\Seeder;

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
