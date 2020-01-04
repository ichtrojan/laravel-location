<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->integer('state_id');
            $table->timestamps();
        });
    }

    protected function getTableName()
    {
        return Config::get('location.cities_table');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }
}
