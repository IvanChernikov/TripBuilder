<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model {
    public $timestamps = false;
	
	public function flights() {
		return $this->hasMany(Flight::class);
	}
}
