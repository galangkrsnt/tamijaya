<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Tami Jaya', 'Tami Jaya') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light scrolled sleep" >
            <div class="container">
                <a class="navbar-brand" href="index.html"><span class="text-success">Tami</span> Jaya</a>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('penumpang.index') }}">Penumpang</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('bus.index') }}">Bus</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.index') }}">Jadwal</a></li>
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

        <main class="py-4" style="margin-top: 100px">
            @yield('content')
        </main>
    </div>
</body>
</html>
