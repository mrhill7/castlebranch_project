<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountiesAndCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counties_cities', function (Blueprint $table) {
            $table->id();
            $table->string('county_name', 120);
            $table->string('zip', 10);
            $table->string('city_name', 120);
            $table->foreignId('state_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('counties_cities');
    }
}
