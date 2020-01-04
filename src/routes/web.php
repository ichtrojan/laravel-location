<?php

Route::group(['prefix' => Config::get('location.routes.prefix'), 'namespace' => 'Ichtrojan\Location\Http\Controllers', 'middleware' => [Config::get('location.routes.middleware')]], function () {
    # Get all Countries
    Route::get('countries', 'LocationController@getCountries');

    # Get a Country by its ID
    Route::get('country/{id}', 'LocationController@getCountry');

    # Get all States
    Route::get('states', 'LocationController@getStates');

    # Get a State by its ID
    Route::get('state/{id}', 'LocationController@getState');

    # Get all States in a Country using the Country ID
    Route::get('states/{countryId}', 'LocationController@getStatesByCountry');

    # Get all Cities
    Route::get('cities', 'LocationController@getCities');

    # Get a City by its ID
    Route::get('city/{id}', 'LocationController@getCity');

    # Get all Cities in a State using the State ID
    Route::get('cities/{stateId}', 'LocationController@getCitiesByStates');

    # Get all Cities in a Country using the Country ID
    Route::get('country-cities/{countryId}', 'LocationController@getCitiesByCountry');
});
