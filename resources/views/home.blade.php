@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <h1>Welcome to Airline Reservation System</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flight Search</h5>
                        <p class="card-text">Search for available flights.</p>
                        <a href="{{ route('flights.search.form') }}" class="btn btn-primary">Go to Flight Search</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Processing</h5>
                        <p class="card-text">Select an appropriate payment method.</p>
                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Go to Payment Processing</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Bookings</h5>
                        <p class="card-text">Click here to view your bookings.</p>
                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">View Bookings</a>
                    </div>
                </div>
            </div>
            <!-- Add more cards for other functionalities -->
        </div>
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

