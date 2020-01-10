# Laravel Location ▲

![hero](https://res.cloudinary.com/ichtrojan/image/upload/v1557612717/Screenshot_2019-05-11_at_11.11.17_PM_qvatw1.png)

## Introduction 🖖
This Package offers a simple way to get Countries, Cities and States that you may need for your Application, most especially for dropdown menus.

### Step One - Install via Composer 🎼

Require the package via composer into your project

```shell
composer require ichtrojan/laravel-location
```

![composer install](https://res.cloudinary.com/ichtrojan/image/upload/v1557601533/Screenshot_2019-05-11_at_8.04.49_PM_ojixaa.png)

### Step Two - Publish Configurations ⚙️
Laravel location provides you with an easy way of customizing the tables used for storing Countries, States and Cities. Also, you can customisethe route prefix and middleware. To customize these you need to publish the 
configuration file. To publish the configuration file, run:

`php artisan vendor:publish --tag=laravel-location`

You will have `config/location.php` available for you to edit. The default configurations are:

```php
<?php

return [
    'countries_table' => 'countries',
    'cities_table' => 'cities',
    'states_table' => 'states',
    'routes' => [
        'prefix' => 'location',
        'middleware' => 'web'
    ]
];
```

You can go ahead and customize the `table names`, `route prefix` and `middleware` as you need before running the Migration.

### Step Three - Running Migrations

> before you do this make sure your correct Database credentials are set in the `.env` file

```shell
php artisan migrate
```

![migrations](https://res.cloudinary.com/ichtrojan/image/upload/v1557611272/Screenshot_2019-05-11_at_10.47.34_PM_rxjbia.png)

Finally, run the Package seeders

```shell
php artisan db:seed --class=Ichtrojan\\Location\\Seeds\\LocationDatabaseSeeder
```

## Usage 🧨

>**NOTE**<br>
>The routes below are prefixed with `location` which is the default configuration set in the `config/location.php`
>file. If mofified, replace the prefixin your route with the correct prefix. 

|Route|Description|
|:------------- | :----------: |
|`/location/countries`|return all countries|
|`/location/country/{id}`|return a single country by its ID|
|`/location/states`|return all states|
|`/location/state/{id}`|return a single state by its ID|
|`/location/states/{countryID}`|return all states in a country using the country ID|
|`/location/cities`|return all cities|
|`/location/city/{id}`|return a single city by its ID|
|`/location/cities/{stateID}`|return all cities in a state using the state ID|

## Test
`composer test`

## Contribution

Free for all, if you find an issue with the package or if a group of people somehow created a new country please send in a PR.

Danke Schön
