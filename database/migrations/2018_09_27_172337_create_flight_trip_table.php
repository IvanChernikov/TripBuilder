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
			$table->foreign('flight_id')->on('flights')->refences('id')
			
			$table->unsignedInteger('trip_id');
			$table->foreign('trip_id')->on('trips')->refences('id')
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
