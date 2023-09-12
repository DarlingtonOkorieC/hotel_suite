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
        <i class="bi bi-phone d-flex align-items-center"><span>+2347013978510</span></i>
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
       <a href="/" class="logo me-auto me-lg-0"><img src="{{ asset('app/assets/img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#highest">Highest Rated Hotels</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>          
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
      <a href="{{ route('dashboard') }}"  
      class="book-a-table-btn scrollto d-none d-lg-flex"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      
        Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      @if(Auth::user()->manager)
      <a href="{{ route('dashboard') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Manage Your Hotel</a>
      @endif
      @else
      <a href="{{ route('hotel.create') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Register</a>
      @endif
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @if(Session::has('message'))
  <p class="alert alert-info">{{ Session::get('message') }}</p>
  @endif
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Hotel Suites</span></h1>
          <h2>Giving hotels all over Nigeria the ability to manage their hotels with efficiency!</h2>

          <div class="btns">
            <form action="/search" method="POST">
              {{ csrf_field() }}
            <input type="text" id="hotels" class="animated fadeInUp scrollto" name="city" placeholder="Search A City">
            <button class="btn-book animated fadeInUp scrollto" type="submit">Search</button>
          </form>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{ asset('app/assets/img/about.jpg')}}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Want to get started?</h3>
            <p class="font-italic">
              Hotel Suites is a hotel management solution that can help you keep track of customers, register clients, take record of bookings, keep an online database and so much more!
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Click On The Get Started or Register button scattered all over our homepage.</li>
              <li><i class="bi bi-check-circle"></i> Fill in your hotel details, keeping sure to pick a unique hotel name for your hotel.</li>
              <li><i class="bi bi-check-circle"></i> Edit the beautiful dedicated homepage and dashboard handed to you and viola! You can start booking reservations.</li>
            </ul>
            <p>
            In case of any issue, visit our <a href="#">Guide Portal</a>  
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Hotel Management System?</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Easy To Use</h4>
              <p>Not only is our platform have a simplistic and easy to use build, we have also taken care to ensure the comfort of the hotels under us by preparing a <a href="">Guide Portal</a> where every issue that could ever be encountered is addressed.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Really Affordable</h4>
              <p>Hotel Suites is one of the most affordable Hotel management platforms out in the wild. It's a deliberate decision on our part in order to render the best service at the most affordable prices</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Nationwide Coverage</h4>
              <p>Our coverage reaches in every city in Nigeria, and outside Nigeria.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="highest" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our highest rated hotels</h2>
          <p>and their pricing</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ asset('app/assets/img/menu/lobster-bisque.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">BabaLUA Hotels</a><span>$5.95</span>
            </div>
            <div class="menu-ingredients">
              Address: Aba
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Ten bedroom Hotel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">50 bedroom hotel with bar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">3 Star Hotel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">5 Star Hotel</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>10 BedRoom Hotel</h3>
                    <p class="font-italic">Small motels for emergency visitation</p>
                    <p>Register your motel with us for just 17 dollars per 6 months for 2years</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('app/assets/img/specials-1.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>100 Bedroom hotel with bar</h3>
                    <p class="font-italic">Own a hotel with 50 or more rooms?</p>
                    <p>Even if your hotel is basically 100 rooms and a bar, we will charge as we would a 50 room hotel
                       i.e extremely affordably and you get our platform coverage as well as all the features of your own hotel:
                        A dashboard, a dedicated homepage, an admin panel and custom staff management control centre for a one time payment of 100 dollars</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('app/assets/img/specials-2.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>3 Star Hotel</h3>
                    <p class="font-italic">Own a Three Star Hotel?</p>
                    <p>Hotels with up to 100 or more well-furnished and cared rooms can be sure to get more value for less, including a custom made food ordering system, accessable to your customers. <br> Pricing: 300 dollars</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('assetassets/img/specials-3.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Best Value: 5 Star Hotel</h3>
                    <p class="font-italic">With just 1000 dollars, you get:</p>
                    <p>Dedicated Hosting<br>Self Managed domain name<br>An admin and user panel set up for you <br> An order-tracking system<br> Digital payments<br>Your own custom designs</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{ asset('app/assets/img/specials-5.png')}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->
    @if(count($hotels) > 0)
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Latest Hotels</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
@foreach($hotels as $h)
          <div class="col-lg-3 col-md-4 text-center">
            <div class="gallery-item">
              <a href="{{ asset($h->banner) }}" class="gallery-lightbox" data-gall="gallery-item">
                <img style="max-height: 200px; overflow: none; width: 100%;" src="{{ asset($h->banner) }}" alt="" class="img-fluid">
              </a>
            </div>
            <div class="card card-dark">
              <div class="card-footer">
                <a class="btn btn-primary text-center" href="{{ route('open.hotel', ['title' => $h->title]) }}">
                  View And Book
                  </a>
              </div>
            </div>
          </div>
@endforeach

        </div>

      </div>
    </section><!-- End Gallery Section -->

@endif
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>164 Faulks Road, Aba, AB</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@hs.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>Godson: +2348160430542
                  <br>
                  Stanley: +2347013978510
                  <br>
                  Precious: 
                </p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
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

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
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