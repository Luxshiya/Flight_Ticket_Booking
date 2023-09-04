<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve all bookings associated with the currently logged-in user
        $userBookings = Booking::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();

        // Pass the bookings data to the view
        return view('user_dashboard', compact('userBookings'));
    }
    public function viewBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('view_booking', compact('booking'));
    }

    public function cancelBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        // Check if the booking can be canceled
        // ...

        // Update the flight's available seats count
        $flight = Flight::findOrFail($booking->flight_id);
        $flight->available_seats += 1;
        $flight->save();

        // Delete the booking record
        $booking->delete();

        // Redirect to the user dashboard with a success message
        return redirect()->route('user_dashboard')->with('success', 'Booking canceled successfully.');
    }
    public function simulatePayment($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        // Simulate payment processing (update the booking status)
        $booking->update(['is_paid' => true]);

        // Redirect back to the booking confirmation page with a success message
        return redirect()->route('booking_confirmation', $booking->id)->with('success', 'Payment simulated successfully. Your ticket has been booked.');
    }
    
}
