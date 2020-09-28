@extends('layouts.customer')

@section('content')

    <div class="container" >
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
              <img src="img/kursi_suite.jpeg" alt="Free website template" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Suite Class</h2>
              <h3>Fasilitas : </h3>
                  <h5> Seat konfigurasi 1 - 1 (21)</h5>
                  <h5>Reclining Seat</h5>
                  <h5>TV di setiap Kursi</h5>
                  <h5>Sandal Bus</h5>
                  <h5>Audio Video Karaoke Support : CD, USB.</h5>
                  <h5>Air Conditioner & Toilet</h5>
                  <h5>Bagasi Ektra Luas</h5>
                  <h5>Bantal + Selimut</h5>
                  <h5>1x Snack dan Servis Makan Prasmanan</h5>
                  <h5>1x Kopi atau Teh</h5>
                  <h5></h5>

              <span class="text-uppercase letter-spacing-1"></span>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="#" class="room">
            <figure class="img-wrap">
              <img src="img/kursi2.jpeg" alt="Free website template" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Executive Class</h2>
              <h3>Fasilitas : </h3>
                  <h5>Seat konfigurasi 2 - 2 (30 Seats)</h5>
                  <h5>Ruang Kaki Ekstra Luas dilengkapi Ajustable Leg Rest</h5>
                  <h5>Reclining Seat with Ajustable Arm Rest</h5>
                  <h5>2 LED TV</h5>
                  <h5>Audio Video Karaoke</h5>
                  <h5>Air Conditioner & Toilet</h5>
                  <h5>Bagasi Ektra Luas</h5>
                  <h5>Bantal + Selimut</h5>
                  <h5>1x Snack dan Servis Makan Prasmanan</h5>
                  <h5></h5>
                  <h5></h5>
            </div>
          </a>
        </div>
      </div>
    </div>
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


@endsection


