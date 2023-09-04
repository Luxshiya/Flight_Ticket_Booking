<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showSeatSelection($flightId)
    {
    // Retrieve the flight details and available seats count
    $flight = Flight::findOrFail($flightId);
    $totalRows = 10; // Replace this with the actual number of rows in your seat layout
    $seatsPerRow = 6; // Replace this with the actual number of seats per row in your seat layout

    return view('seat_selection', compact('flight', 'totalRows', 'seatsPerRow'));
    }

    public function bookFlight(Request $request)
    {
    // Validate the input data (you can use BookingRequest if needed)

    $flightNumber = $request->input('flight_number');
    $seatNumber = $request->input('seat_number');

    // Look up the flight based on the flight number
    $flight = Flight::where('flight_number', $flightNumber)->first();

    if (!$flight) {
        return redirect()->back()->with('error', 'Invalid flight number.');
    }

    // Check if the seat is available
    if ($flight->isSeatAvailable($seatNumber)) {
        // Create a new Passenger record
        $passenger = Passenger::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Create a new Booking record and associate it with the flight and user
        $booking = new Booking([
            'passenger_id' => $passenger->id,
            'seat_number' => $seatNumber,
        ]);

        // Assuming you have the user's ID available (if the user is logged in)
        $userId = auth()->user()->id;
        $booking->user_id = $userId;

        $flight->bookings()->save($booking);

        // Update the flight's available seats count
        $flight->available_seats -= 1;
        $flight->save();

        // Payment processing (Integrate with a payment gateway)
        // ...

        // Redirect to the booking confirmation page
        return redirect()->route('booking_confirmation', $booking->id);
    } else {
        return redirect()->back()->with('error', 'The selected seat is not available.');
    }
    }
    public function showBookingConfirmation(Booking $booking)
    {
    // You can fetch additional data related to the booking here if needed
    return view('booking_confirmation', compact('booking'));
    }
}
