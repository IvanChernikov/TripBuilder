<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model {
    
	public function flights() {
		return $this->belongsToMany(Flight::class);
	}
	
	public function getPriceAttribute() {
		return $this->flights->sum('price');
	}
	
}
