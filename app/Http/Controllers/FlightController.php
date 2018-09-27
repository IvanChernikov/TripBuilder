<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Airport;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FlightController extends Controller
{
	/**
     * Controller constructor
     */
	public function __construct() {
		// Protect everything but listing
		$this->middleware('auth:api')->except([
			'index',
			'show',
		]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$flights = Flight::with('arrivalAirport')
			->with('departureAirport')
			->with('airline');
			
		if ($request->from) {
			$flights->fromAirport($request->from);
		}
		if ($request->to) {
			$flights->toAirport($request->to);
		}
		if ($request->date) {
			$date = Carbon::parse($request->date);
			$flights->where('departs_at', '>', $date);
		}
        // TODO: Filtering and pagination
		return $flights->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        return $flight->load('airline')->load('arrivalAirport')->load('departureAirport');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
