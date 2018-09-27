<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsigned_integer('airline_id');
			$table->foreign('airline_id')->on('airlines')->references('id');
			
			$table->unsigned_integer('departure_airport_id');
			$table->foreign('departure_airport_id')->on('airports')->references('id');
			
			$table->unsigned_integer('arrival_airport_id');
			$table->foreign('arrival_airport_id')->on('airports')->references('id');
			
			$table->timestamp('departs_at');
			$table->timestamp('arrives_at');
			
			$table->string('number');
			
			$table->decimal('price', 8, 2);
			
			// Number is unique per airline
			$table->unique(['airline_id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}