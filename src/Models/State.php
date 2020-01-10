<?php

namespace Ichtrojan\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class State extends Model
{
    protected $table = 'states';

    public function getTable()
    {
        return Config::get('location.states_table', $this->table);
    }
}
