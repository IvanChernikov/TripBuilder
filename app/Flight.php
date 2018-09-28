<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {
    public $timestamps = false;
	protected $dates = ['arrives_at', 'departs_at'];
	
	public function airline() {
		return $this->belongsTo(Airline::class);
	}
	
	public function arrivalAirport() {
		return $this->belongsTo(Airport::class, 'arrival_airport_id');
	}
	
	public function departureAirport() {
		return $this->belongsTo(Airport::class, 'departure_airport_id');
	}
	
	public function trips() {
		return $this->belongsToMany(Trip::class);
	}
	
	// Scopes
	/**
     * Filters flights by departure airport
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $airport ID or Code
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeFromAirport($query, $airport) {
		$airport = Airport::whereCodeOrId($airport)->first();
		return $query->where('departure_airport_id', optional($airport)->id);
	}
	/**
     * Filters flights by arrival airport
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $airport ID or Code
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeToAirport($query, $airport) {
		$airport = Airport::whereCodeOrId($airport)->first();
		return $query->where('arrival_airport_id', optional($airport)->id);
	}
}
