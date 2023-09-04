@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Booking Confirmation</h1>
        <p><strong>Flight:</strong> {{ $booking->flight->flight_number }}</p>
        <p><strong>Passenger Name:</strong> {{ $booking->passenger->name }}</p>
        <p><strong>Email:</strong> {{ $booking->passenger->email }}</p>
        <p><strong>Phone Number:</strong> {{ $booking->passenger->phone }}</p>
        <p><strong>Seat Number:</strong> {{ $booking->seat_number }}</p>
        <p><strong>Booking Status:</strong> {{ $booking->is_paid ? 'Paid' : 'Pending Payment' }}</p>

        @if (!$booking->is_paid)
            <!-- Add payment processing options here, e.g., a button to simulate payment -->
            <form action="{{ route('simulate_payment', $booking->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
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
