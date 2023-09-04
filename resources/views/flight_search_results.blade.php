<!-- resources/views/flight_search_results.blade.php -->
@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        <h1>Flight Search Results</h1>
        @if ($flights->isEmpty())
            <p>No flights found for the selected criteria.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Flight Number</th>
                        <th>Departure Airport</th>
                        <th>Destination Airport</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Available Seats</th>
                        <th>Ticket Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flights as $flight)
                        <tr>
                            <td>{{ $flight->flight_number }}</td>
                            <td>{{ $flight->departure_airport }}</td>
                            <td>{{ $flight->destination_airport }}</td>
                            <td>{{ $flight->departure_time }}</td>
                            <td>{{ $flight->arrival_time }}</td>
                            <td>{{ $flight->available_seats }}</td>
                            <td>{{ $flight->ticket_price }}</td>
                            <td>
                                <a href="{{ route('flights.select_seat', $flight->id) }}" class="btn btn-primary">Select Seat</a>
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
