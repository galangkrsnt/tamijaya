@extends('layouts.customer')

@section('content')
<section class="section">
    <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" >
            <img src="img/background.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading mb-4">PO.Tami Jaya</h2>
            <p class="mb-5">Didirikan pada tahun 1985, PO Tami Jaya adalah layanan bus pariwisata yang berpengalaman melayani perjalanan pariwisata dengan armada bus yang berkualitas dan terpercaya. Apapun keperluan wisata anda, mulai dari study tour, wisata, wisata religi, city tour, dan over land. Armada bus pariwisata kami selalu dapat diandalkan dan pastinya memberikan service yang memuaskan. PO Tami Jaya telah memiliki izin pariwisata yang lengkap dan resmi, armada bus pariwisata kami selalu terawat dan didukung oleh crew bus pariwisata yang ramah dan berpengalaman. PO Tami Jaya juga menyediakan armada bus pariwisata medium dengan kapasitas penumpang 25-31 seats, bus pariwisata dengan big bus kapasitas 30-59 seats, dan juga melayani bus malam umum dengan trayek Yogya – Bali – Padang Bai. Percayakanlah perjalanan anda dengan kami dan rasakan pengalaman berwisata yang mengesankan dan bersahabat.Tami Jaya, We Love To Trip With You.</p>
          </div>

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
@endsection


