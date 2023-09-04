<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Total Users: {{ $total_users }}</p>
        <p>Total Flights: {{ $total_flights }}</p>
        <!-- Add more content and features here -->
    </div>
@endsection
