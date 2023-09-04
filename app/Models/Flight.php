<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    public function isSeatAvailable(string $seatNumber): bool
    {
        // You need to implement the logic to check if the seat is available or not.
        // For example, you might check if the seat is already booked in the bookings table.
        // Here's a simple example, assuming that you have a `bookings` relationship defined:
        return !$this->bookings()->where('seat_number', $seatNumber)->exists();
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
