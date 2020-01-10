<?php

namespace Ichtrojan\Location\Test;

use Ichtrojan\Location\LocationServiceProvider;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Orchestra\Testbench\Concerns\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase();

        // Note: this also flushes the cache from within the migration
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LocationServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app.key', 'base64:' . base64_encode(
                Encrypter::generateKey($app['config']['app.cipher'])
            ));

        $app['config']->set('location.states_table', 'states');
        $app['config']->set('location.cities_table', 'cities');
        $app['config']->set('location.countries_table', 'countries');
        $app['config']->set('location.routes.prefix', 'location');
        $app['config']->set('location.routes.middleware', 'web');
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase()
    {
        $this->createCountriesTable();
        $this->createStatesTable();
        $this->createCitiesTable();
        $this->addCountryColumnToCitiesTable();
        $this->seedCountriesTable();
        $this->seedStatesTable();
        $this->seedCitiesTable();
        $this->updateCitiesTable();
    }

    protected function createCountriesTable()
    {
        include_once __DIR__ . '/../src/database/migrations/2019_05_11_000000_create_countries_table.php';
        (new \CreateCountriesTable())->up();
    }

    protected function createStatesTable()
    {
        include_once __DIR__ . '/../src/database/migrations/2019_05_11_000000_create_states_table.php';
        (new \CreateStatesTable())->up();
    }

    protected function createCitiesTable()
    {
        include_once __DIR__ . '/../src/database/migrations/2019_05_11_000000_create_cities_table.php';
        (new \CreateCitiesTable())->up();
    }

    protected function addCountryColumnToCitiesTable()
    {
        include_once __DIR__ . '/../src/database/migrations/2019_12_01_000000_add_country_id_column_to_cities_table.php';
        (new \AddCountryIdColumnToCitiesTable())->up();
    }

    protected function seedCountriesTable()
    {
        include_once __DIR__ . '/../src/database/seeds/CountriesTableSeeder.php';
        (new \CountriesTableSeeder())->run();
    }

    protected function seedStatesTable()
    {
        include_once __DIR__ . '/../src/database/seeds/StatesTableSeeder.php';
        (new \StatesTableSeeder())->run();
    }

    protected function seedCitiesTable()
    {
        include_once __DIR__ . '/../src/database/seeds/CitiesTableSeeder.php';
        (new \CitiesTableSeeder())->run();
    }

    protected function updateCitiesTable()
    {
        include_once __DIR__ . '/../src/database/seeds/StateCityCountrySeeder.php';
        (new \StateCityCountrySeeder())->run();
    }

}
