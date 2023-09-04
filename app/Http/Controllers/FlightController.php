<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;


class FlightController extends Controller
{
    public function flightSearchForm()
    {
    $departureAirports = Flight::distinct('departure_airport')->pluck('departure_airport');
    $destinationAirports = Flight::distinct('destination_airport')->pluck('destination_airport');
    return view('flight_search', compact('departureAirports', 'destinationAirports'));
    }

    public function searchFlights(Request $request)
    {
        $departureAirport = $request->input('departure_airport');
        $destinationAirport = $request->input('destination_airport');
        $departureDate = $request->input('departure_date');

        $flights = Flight::query()
            ->where('departure_airport', $departureAirport)
            ->where('destination_airport', $destinationAirport)
            ->whereDate('departure_time', '=', $departureDate)
            ->where('available_seats', '>', 0)
            ->get();

        return view('flight_search_results', compact('flights'));
    }

    // methods of admin
    public function index()
    {
    // Retrieve all flights
    $flights = Flight::all();
    return view('admin.flights.index', compact('flights'));
    }

    public function create()
    {
    // Show the flight creation form
    return view('admin.flights.create');
    }

    public function store(Request $request)
    {
    // Validation and store new flight details
    // ...

    // Redirect back to the admin flight listing with success message
    return redirect()->route('admin.flights.index')->with('success', 'Flight created successfully.');
    }

    public function edit(Flight $flight)
    {
    // Show the flight edit form with the current flight data
    return view('admin.flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
    // Validation and update the flight details
    // ...

    // Redirect back to the admin flight listing with success message
    return redirect()->route('admin.flights.index')->with('success', 'Flight updated successfully.');
    }

    public function destroy(Flight $flight)
    {
    // Delete the flight record
    $flight->delete();

    // Redirect back to the admin flight listing with success message
    return redirect()->route('admin.flights.index')->with('success', 'Flight deleted successfully.');
    }

}
