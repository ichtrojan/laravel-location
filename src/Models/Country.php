<?php

namespace Ichtrojan\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Country extends Model
{
    protected $table = 'countries';

    public function getTable()
    {
        return Config::get('location.countries_table', $this->table);
    }
}
