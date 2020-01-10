<?php

namespace Ichtrojan\Location\Test;

use Ichtrojan\Location\Models\City;
use Ichtrojan\Location\Models\State;

class LocationRouteTest extends TestCase
{

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */
    /** @test */
    public function it_can_access_countries_list()
    {
        $response = $this->get('location/countries');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue(count($responseData) == 246);
    }

    /** @test */
    public function it_can_access_country_by_id()
    {
        $response = $this->get('location/country/1');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $firstCountry = [
            'id' => 1,
            'code' => 'AF',
            'name' => 'Afghanistan',
            'phonecode' => '93',
        ];
        $this->assertEquals($firstCountry, $responseData[0]);
    }

    /** @test */
    public function it_can_access_states_list()
    {
        $response = $this->get('location/states');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $this->assertTrue(count($responseData) == 4121);
    }

    /** @test */
    public function it_can_access_state_by_id()
    {
        $response = $this->get('location/state/1');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $firstCountry = [
            'id' => 1,
            'name' => "Andaman and Nicobar Islands",
            'country_id' => 101
        ];
        $this->assertEquals($firstCountry, $responseData[0]);
    }

    /** @test */
    public function it_can_access_states_by_country()
    {
        $response = $this->get('location/states/1');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $firstState = [
            'name' => 'Badakhshan',
            'id' => 42
        ];

        $this->assertEquals($firstState, $responseData[0]);
    }

    /** @test */
    public function it_can_access_cities_list()
    {
        $response = $this->get('location/cities');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);

        $this->assertTrue(count($responseData) == 48017);
    }

    /** @test */
    public function it_can_access_city_by_id()
    {
        $response = $this->get('location/city/1');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $firstCity = [
            'id' => 1,
            'name' => "Bombuflat",
            'state_id' => 1
        ];
        $this->assertEquals($firstCity, $responseData[0]);
    }

    /** @test */
    public function it_can_access_cities_by_state()
    {
        $response = $this->get('location/cities/1');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);
        $firstCity = [
            'name' => 'Bombuflat',
            'id' => 1
        ];

        $this->assertEquals($firstCity, $responseData[0]);
    }

    /** @test */
    public function it_can_access_cities_by_country()
    {
        $response = $this->get('location/country-cities/223');
        $response->assertStatus(200);
        $responseData = json_decode($response->getContent(), true);

        $firstCity = [
            'name' => 'Adiyaman',
            'id' => 40282
        ];

        $this->assertEquals($firstCity, $responseData[0]);
    }

    /** @test */
    public function test_all_states_have_country_id()
    {
        $count = State::query()
            ->whereNull('country_id')
            ->count();

        $this->assertEquals(0, $count);
    }

    /** @test */
    public function test_all_cities_have_country_id()
    {
        $count = City::query()
            ->whereNull('country_id')
            ->count();

        $this->assertEquals(0, $count);
    }

    /** @test */
    public function test_all_cities_have_state_id()
    {
        $count = City::query()
            ->whereNull('state_id')
            ->count();

        $this->assertEquals(0, $count);
    }

}

