<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model {
    protected timestamps = false;
	
	public function flights() {
		return $this->hasMany(Flight::class);
	}
}
