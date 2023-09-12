<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotel_Suites</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('app/assets/img/logo.png')}}" rel="icon">
  <link href="{{ asset('app/assets/img/logo')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('app/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('app/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('app/assets/css/style.css')}}" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        @if(isset($hotel->phone))
        <i class="bi bi-phone d-flex align-items-center"><span>{{ $hotel->phone }}</span></i>
        @else

        <i class="bi bi-phone d-flex align-items-center"><span>+2347013978510</span></i>
        @endif
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>En</li>
          <li><a href="#">Sp</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      {{-- <h1 class="logo me-auto me-lg-0"><a href="#">Hotel Suites</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ asset('app/assets/img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li class="dropdown"><a href="#"><span></span>Options <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="#contact">Contact</a></li>
              </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @if(Auth::check())
      @if(Auth::user()->isManager)
      <a href="{{ route('dashboard') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Manage Your Hotel</a>
      @endif
      @else
      <a href="{{ route('hotel.create') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Register</a>
      @endif
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="herom" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    
    </div>
    
  </section><!-- End Hero -->

  <main id="main">
    @foreach ($errors->all() as $error)
    {{ $error }}<br/>
@endforeach

@yield('content')

</main><!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer">
<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="footer-info">
          <h3>Hotel Suites</h3>
          <p>
            164 Faulks Road, Aba <br>
            AB 456001, NG<br><br>
            <strong>Phone:</strong> +2347013978510<br>
            <strong>Email:</strong> info@hs.com<br>
          </p>
        </div>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>


      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Our Newsletter</h4>
        <p>Want to receive updates on how best to run your hotel?</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>

      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Hotel Suites</span></strong>. All Rights Reserved
  </div>
  
</div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('app/assets/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('app/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('app/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('app/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{ asset('app/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('app/assets/js/main.js')}}"></script>

</body>

</html>