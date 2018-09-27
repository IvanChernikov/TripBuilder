<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
			$table->string('name');
			$table->string('city');
			$table->string('city_code')->unique();
			$table->string('country_code');
			$table->string('region_code')->nullable();
			// Range -90 to +90
			$table->decimal('latitude', 8, 6);
			// Range -180 to +180
			$table->decimal('longitude', 9, 6);
			$table->string('timezone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
