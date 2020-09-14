<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tami Jaya</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>

  </head>
  <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200">

  <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="templateux-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><span class="text-success">Tami</span> Jaya</a>
      <div class="site-menu-toggle js-site-menu-toggle  ml-auto"  data-aos="fade" data-toggle="collapse" data-target="#templateux-navbar-nav" aria-controls="templateux-navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <!-- END menu-toggle -->

      <div class="collapse navbar-collapse" id="templateux-navbar-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.cari') }}">Pesan Tiket</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('customer.tiketku') }}">Tiketku</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('bus') }}">Bus</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

    <section class="site-hero overlay" style="background-image: url(img/background.jpg)" data-stellar-background-ratio="0.5" id="section-home">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="heading">Tami Jaya Transport</h1>
            <p style="color: white"> Nikmati Perjalanan Yang Nyaman Dengan Bus Tami Jaya </p>
            <p style="color: white"> We Love to Trip With You </p>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next" >
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section bg-light pb-0"  >
      <div class="container">

        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form method="GET" action="{{ route('jadwal.hasilCari') }}">
                @csrf
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="tgl_keberangkatan" class="font-weight-bold text-black">Tanggal</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" id="tgl_keberangkatan" class="form-control" name="tgl_keberangkatan" min="{{ date('Y-m-d') }}">
                  </div>
                </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                      <label for="tempat_berangkat" class="font-weight-bold text-black">Dari</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="tempat_berangkat" id="tempat_berangkat" class="form-control">
                          <option value="Yogyakarta">Yogyakarta</option>
                          <option value="Denpasar">Denpasar</option>
                        </select>
                      </div>
                    </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                      <label for="tujuan" class="font-weight-bold text-black">Tujuan</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="tujuan" id="tujuan" class="form-control">
                          <option value="Denpasar">Denpasar</option>
                          <option value="Yogyakarta">Yogyakarta</option>
                        </select>
                      </div>
                    </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button class="btn btn-success btn-block text-white">Cari Tiket</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light" id="section-about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <img src="img/background.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading mb-4">PO.Tami Jaya</h2>
            <p class="mb-5">Didirikan pada tahun 1985, PO Tami Jaya adalah layanan bus pariwisata yang berpengalaman melayani perjalanan pariwisata dengan armada bus yang berkualitas dan terpercaya.</p>
            <p><a href="#"  data-fancybox class="btn btn-success text-white py-2 mr-3 text-uppercase letter-spacing-1">Baca Selengkapnya</a></p>
          </div>

        </div>
      </div>
    </section>
    <section class="section" id="section-rooms">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">BUS</h2>
            <p data-aos="fade-up" data-aos-delay="100">Menyediakan dua tipe bus yaitu Suite Class dan Executive Class</p>
          </div>
        </div>
        <div class="row" >
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="img/suite.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Suite Class</h2>
                <span class="text-uppercase letter-spacing-1"></span>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="img/background.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Executive Class</h2>
                <span class="text-uppercase letter-spacing-1"></span>
              </div>
            </a>
          </div>


        </div>
      </div>
    </section>
    <footer class="section footer-section">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><a href="{{ route('jadwal.cari')}}">Pesan Tiket</a></li>
                <li><a href="{{ route('bus') }}">Bus</a></li>
                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
              </ul>
            </div>
            <div class="col-md-5 mb-5 pr-md-5 contact-info">
              <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
              <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-success"></span>Alamat:</span> <span> Jl. RE Martadinata No.84 <br> Yogyakarta</span></p>
              <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-success"></span>Telp:</span> <span>Yogyakarta, 0822-2688-0162 - Dwi </span></p>
              <p><span class="d-block"></span> <span>Denpasar,  0813-3865-2996 - Wayan</span></p>
              <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-success"></span>Email:</span> <span> office@tamijaya-transport.com</span></p>
            </div>
          </div>
          <div class="row pt-5">
            <p class="col-md-8 text-left">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            PO. Tami Jaya
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            <p class="col-md-4 text-right social">
              <a href="#"><span class="fa fa-instagram"></span></a>
              <a href="#"><span class="fa fa-facebook"></span></a>
              <a href="#"><span class="fa fa-twitter"></span></a>
              <a href="#"><span class="fa fa-linkedin"></span></a>
              <a href="#"><span class="fa fa-vimeo"></span></a>
            </p>
          </div>
        </div>
      </footer>




    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>



    <script src="js/aos.js"></script>

    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
