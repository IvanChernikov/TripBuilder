<?php

use Faker\Generator as Faker;

$factory->define(App\Airline::class, function (Faker $faker) {
    return [
		'code' => $faker->unique()->regexify('[A-Z]{2,3}'),
		'name' => $faker->company,
    ];
});
