<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model {
    public $timestamps = false;
	
	public function arrivingFlights() {
		return $this->hasMany(Flight::class, 'arrival_airport_id');
	}
	
	public function departingFlights() {
		return $this->hasMany(Flight::class, 'departure_airport_id');
	}
	
	public function flights() {
		return $this->arrivingFlights->concat($this->departingFlights)
			->unique(function ($flight) {
				return $flight->id;
			});
	}
	public function getFlightsAttribute() {
		return $this->flights();
	}
}
