<?php

namespace Ichtrojan\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class City extends Model
{
    protected $table = 'cities';

    public function getTable()
    {
        return Config::get('location.cities_table', $this->table);
    }
}
