<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function simulatePayment($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        // Simulate payment processing (update the booking status)
        $booking->update(['is_paid' => true]);

        return view('view_booking', compact('booking'))->with('success', 'Booking payment successful. Your ticket has been booked.');
    }

}

