<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Add any other attributes you want to allow for mass assignment
        'email',
        'phone',
        
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
