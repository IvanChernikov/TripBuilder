<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // From test data
		DB::table('airlines')->insert([
			'code' => 'AC',
			'name' => 'Air Canada',
		]);
		
		// From Factory
		factory(App\Airline::class, 10)->create();
    }
}
