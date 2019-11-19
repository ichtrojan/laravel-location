# Laravel Location ▲

![hero](https://res.cloudinary.com/ichtrojan/image/upload/v1557612717/Screenshot_2019-05-11_at_11.11.17_PM_qvatw1.png)

## Introduction 🖖
This Package offers a simple way to get Countries, Cities and States that you may need for your Application, most especially for dropdown menus.

### Step One - Installation

Require the package via composer into your project

```shell
composer require ichtrojan/laravel-location
```

![composer install](https://res.cloudinary.com/ichtrojan/image/upload/v1557601533/Screenshot_2019-05-11_at_8.04.49_PM_ojixaa.png)

### Step Two - Publishing Configurations
Laravel location provides you with an easy way of customizing the tables used for storing Countries, States and Cities. To customize this you need to publish the 
configuration file and edit the table names. To publish the configuration files, run:

`php artisan vendor:publish --tag=laravel-location-config`

You will have `config/laravel-location.php` available for you to edit. Te default content of the configuration is like so:
```php
<?php
    return [
        'countries_table' => 'countries',
        'cities_table' => 'cities',
        'states_table' => 'states',
    ];
```
You can go ahead and customize the Table names as you need before running the Migration.

### Step Three - Publishing Seeds

Next, publish the Seeders from the package

```shell
php artisan vendor:publish --tag=laravel-location-seeds
```

or Run

```shell
php artisan vendor:publish
```

You will end up with a selection like this

![vendor publish](https://res.cloudinary.com/ichtrojan/image/upload/v1557610923/Screenshot_2019-05-11_at_10.41.45_PM_igxnq3.png)

input the number that matches with `Ichtrojan\Location\LocationServiceProvider` and press enter.

![vendor published](https://res.cloudinary.com/ichtrojan/image/upload/v1557611069/Screenshot_2019-05-11_at_10.44.15_PM_e3os9s.png)

### Step Four - Running Migrations

> before you do this make sure your correct Database credentials are set in the `.env` file

```shell
php artisan migrate
```

![migrations](https://res.cloudinary.com/ichtrojan/image/upload/v1557611272/Screenshot_2019-05-11_at_10.47.34_PM_rxjbia.png)

Finally, run the Package seeders

```shell
php artisan db:seed --class=LocationDatabaseSeeder
```

![seeds](https://res.cloudinary.com/ichtrojan/image/upload/v1557611591/Screenshot_2019-05-11_at_10.52.04_PM_yrclse.png)

## Usage 🧨

|Endpoint|Description|
|:------------- | :----------: |
|`/location/countries`|return all countries|
|`/location/country/{id}`|return a single country by its ID|
|`/location/states`|return all states|
|`/location/state/{id}`|return a single state by its ID|
|`/location/states/{countryID}`|return all states in a country using the country ID|
|`/location/cities`|return all cities|
|`/location/city/{id}`|return a single city by its ID|
|`/location/cities/{stateID}`|return all cities in a state using the state ID|

## Contribution

Free for all, if you find an issue with the package or if a group of people somehow created a new country please send in a PR.

Danke Schön
