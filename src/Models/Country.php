<?php

namespace Ichtrojan\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table;

    public function __construct() {
        $this->table = config('location.table.countries');
    }
}
