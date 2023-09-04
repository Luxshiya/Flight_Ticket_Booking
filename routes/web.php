<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminAuth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome Route

Route::get('/', function () {
    return view('index');
});

// Flight Search Routes
Route::get('/flights/search', [FlightController::class, 'flightSearchForm'])->name('flights.search.form');
Route::get('/flights/search/results', [FlightController::class, 'searchFlights'])->name('flights.search');

// Seat Selection and Booking Routes
Route::get('/flights/{flight}/select-seat', [BookingController::class, 'showSeatSelection'])->name('flights.select_seat');
Route::post('/flights/{flight}/book', [BookingController::class, 'bookFlight'])->name('flights.book');



// Booking Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/bookings/{booking}', [UserController::class, 'viewBooking'])->name('user.view_booking');
    Route::post('/user/bookings/{booking}/cancel', [UserController::class, 'cancelBooking'])->name('user.cancel_booking');
});


Route::get('/booking/{booking}', [UserController::class, 'viewBooking'])->name('view_booking');

// Define a route for canceling a booking
Route::get('/booking/cancel/{booking}', [UserController::class, 'cancelBooking'])->name('cancel_booking');


// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Booking Confirmation Route
Route::get('/booking_confirmation/{booking}', [BookingController::class, 'showBookingConfirmation'])
    ->name('booking_confirmation');

// Simulate Payment Route
Route::post('/simulate-payment/{bookingId}', [UserController::class, 'simulatePayment'])->name('simulate_payment');


// admin routes
use App\Http\Controllers\AdminAuth\RegisterController;

Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [RegisterController::class, 'register']);


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);



// routes/web.php

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

