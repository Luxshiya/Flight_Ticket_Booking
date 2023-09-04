@extends('layouts.app')

@section('content')

<main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{asset('assets/img/flight.jpg')}}" alt="" data-aos="fade-in">
    <div class="container">
        <h1>Seat Selection for Flight: {{ $flight->flight_number }}</h1>
        <p>Available Seats: {{ $flight->available_seats }}</p>
        <div class="seat-layout">
        @for ($row = 1; $row <= $totalRows; $row++)
          <div class="seat-row">
            @for ($col = 1; $col <= $seatsPerRow; $col++)
                @php
                    $seatNumber = chr(64 + $row) . $col;
                @endphp
                <div class="seat" data-seat-number="{{ $seatNumber }}" onclick="handleSeatSelection('{{ $seatNumber }}')">{{ $seatNumber }}</div>
            @endfor
          </div>
        @endfor
    </div>


        <form action="{{ route('flights.book', $flight) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Passenger Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="seat_number">Selected Seat Number:</label>
                <input type="text" name="seat_number" id="seat_number" readonly>
            </div>
            <input type="hidden" name="flight_number" value="{{ $flight->flight_number }}">
            
            <button type="submit" class="btn btn-primary">Book Flight</button>
        </form>
    </div>

    <script>
        function handleSeatSelection(seatNumber) {
            // Update the value of the read-only input field
            document.getElementById('seat_number').value = seatNumber;
        }
    </script>

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
