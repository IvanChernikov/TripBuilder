<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Airport;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$montreal = Airport::find(1);
		$vancouver = Airport::find(2);
        // From test data
		DB::table('flights')->insert([
			'airline_id' => 1,
			'number' => '301',
			'departure_airport_id' => $montreal->id,
			'departs_at' => Carbon::parse('december 1st 7:35am', $montreal->timezone),
			'arrival_airport_id' => $vancouver->id,
			'arrives_at' => Carbon::parse('december 1st 10:05am', $vancouver->timezone),
			'price' => 273.23
		]);
		DB::table('flights')->insert([
			'airline_id' => 1,
			'number' => '302',
			'departure_airport_id' => $vancouver->id,
			'departs_at' => Carbon::parse('december 5th 11:30am', $vancouver->timezone),
			'arrival_airport_id' => $montreal->id,
			'arrives_at' => Carbon::parse('december 5th 7:11pm', $montreal->timezone),
			'price' => 220.63
		]);
    }
}
