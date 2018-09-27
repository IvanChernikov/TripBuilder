<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_trip', function (Blueprint $table) {
			$table->unsignedInteger('flight_id');
			$table->foreign('flight_id')->on('flights')->references('id');
			
			$table->unsignedInteger('trip_id');
			$table->foreign('trip_id')->on('trips')->references('id');
			
			$table->primary(['flight_id', 'trip_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_trip');
    }
}
