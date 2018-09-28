<?php

use Faker\Generator as Faker;

use App\Airline;
use App\Airport;

$factory->define(App\Flight::class, function (Faker $faker) {
	
	$airline = Airline::find($faker->numberBetween(1, Airline::count()));
	$departs_from = Airport::find($faker->numberBetween(1, Airport::count()));
	$departs_at = $faker->dateTime(today()->addDays(365), $departs_from->timezone);
	$arrives_to = Airport::find($faker->numberBetween(1, Airport::count()));
	$max_arrives_at = clone $departs_at;
	$max_arrives_at->modify('+6 hours');
	$arrives_at = $faker->dateTimeBetween($departs_at, $max_arrives_at, $arrives_to->timezone);
	
    return [
        'airline_id' => $airline->id,
		'number' => $faker->unique()->regexify('[0-9]{3,4}'),
		'departure_airport_id' => $departs_from->id,
		'departs_at' => $departs_at,
		'arrival_airport_id' => $arrives_to->id,
		'arrives_at' => $arrives_at,
		'price' => $faker->randomFloat(2, 100, 5000),
    ];
});
