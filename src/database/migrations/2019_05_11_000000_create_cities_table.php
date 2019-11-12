<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Table name
     *
     * @var string
     */
    public $tbName;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() {
        $this->tbName = config('location.table.cities');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tbName, function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->integer('state_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tbName);
    }
}
