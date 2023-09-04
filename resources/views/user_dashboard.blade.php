<!-- user_dashboard.blade.php -->
@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        <h1>User Dashboard</h1>
        @if ($userBookings->isEmpty())
            <p>No bookings found for the user.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Flight Number</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Seat Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userBookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->flight->flight_number }}</td>
                            <td>{{ $booking->flight->departure_time }}</td>
                            <td>{{ $booking->flight->arrival_time }}</td>
                            <td>{{ $booking->seat_number }}</td>
                            <td>{{ $booking->is_paid ? 'Paid' : 'Pending Payment' }}</td>
                            <td>
                                <form action="{{ route('user.view_booking', $booking->id) }}" method="GET" style="display: inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                                <form action="{{ route('user.cancel_booking', $booking->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


    </section><!-- End Hero Section -->
</main>


  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>    
@endsection
