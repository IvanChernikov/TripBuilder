<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Airport;

class BuilderController extends Controller {
    public function index() {
		$airports = Airport::all();
		return view('builder', compact('airports'));
	}
}
