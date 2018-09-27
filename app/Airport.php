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
	
	// Scopes
	
	/**
     * Filter scope by an airport code or id
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $reference of the airport
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeWhereCodeOrId($query, $reference) {
		// group where statements
		return $query->where(function ($query) use ($reference) {
			$query->where('code', $reference)
				->orWhere('id', $reference);
		});
	}
}
