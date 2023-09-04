<!-- resources/views/flight_search.blade.php -->
@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        <h1>Flight Search</h1>
        <form action="{{ route('flights.search') }}" method="GET">
            @csrf
            
            <div class="form-group">
             <label for="departure_airport">Departure Airport:</label>
              <select name="departure_airport" id="departure_airport" required>
               <option value="" disabled selected>Select Departure Airport</option>
                @foreach ($departureAirports as $departureAirport)
                 <option value="{{ $departureAirport }}">{{ $departureAirport }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
             <label for="destination_airport">Destination Airport:</label>
              <select name="destination_airport" id="destination_airport" required>
               <option value="" disabled selected>Select Destination Airport</option>
                @foreach ($destinationAirports as $destinationAirport)
                 <option value="{{ $destinationAirport }}">{{ $destinationAirport }}</option>
                @endforeach
              </select>
            </div>


            <div class="form-group">
                <label for="departure_date">Departure Date:</label>
                <input type="date" name="departure_date" id="departure_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Search Flights</button>
        </form>
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
