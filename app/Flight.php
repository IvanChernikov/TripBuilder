<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {
    public $timestamps = ['arrives_at', 'departs_at'];
	
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
}
