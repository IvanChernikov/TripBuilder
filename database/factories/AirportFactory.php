<?php

use Faker\Generator as Faker;

$factory->define(App\Airport::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->regexify('[A-Z]{3}'),
		'name' => $faker->company,
		'city' => $faker->city,
		'city_code' => $faker->unique()->regexify('[A-Z]{3}'),
		'country_code' => 'US',
		'region_code' => $faker->stateAbbr,
		'latitude' => $faker->latitude,
		'longitude' => $faker->longitude,
		'timezone' => $faker->timezone,
    ];
});
