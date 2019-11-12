<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table name
    |--------------------------------------------------------------------------
    | Table name for laravel location.
    */

    'table' => [
        'cities' => env('LOCATION_TBNAME_CITIES', 'cities'),
        'countries' => env('LOCATION_TBNAME_COUNTRIES', 'countries'),
        'states' => env('LOCATION_TBNAME_STATES', 'states'),
    ],

];
