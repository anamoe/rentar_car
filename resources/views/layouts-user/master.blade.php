<!DOCTYPE html>
<html public/lang="en">

<head>
  <title>RAHMANA RENT-CAR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('public/landingpage/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/animate.css')}}">

  <link rel="stylesheet" href="{{asset('public/landingpage/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('public/landingpage/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('public/landingpage/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/landingpage/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('public/arfa/toastr/toastr.min.css') }}">


  <link rel="stylesheet" href="{{asset('public/landingpage/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/icomoon.css')}}">
  <link rel="stylesheet" href="{{asset('public/landingpage/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

  <style>
    .nav-item {
      color: blue;
    }
  </style>
  @stack('css')
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{url('')}}"><span style="color: #179bbd;">RAHMANA RENT - CAR</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto" style="">
          <li class="nav-item active"><a href="{{url('')}}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Order
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('paket-wisata') }}">Order Paket Wisata</a>
              <a class="dropdown-item" href="{{ url('paket-mobil') }}">Order Mobil</a>
            </div>
          </li>

          <li class="nav-item active"><a href="{{url('about')}}" class="nav-link">About</a></li>
          <li class="nav-item active"><a href="{{url('term-condition')}}" class="nav-link">Term & Condition</a></li>
          <li class="nav-item active"><a href="{{url('contact')}}" class="nav-link">Contact</a></li>
          @auth
          <li class="nav-item">
            <div class="btn-group mb-2 mt-2">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->name}}
              </button>
              <div class="dropdown-menu" style="width:100px">
                <!-- <a class="dropdown-item" href="{{url('profil')}}">Profil</a> -->
                <a class="dropdown-item" href="{{url('customer/transaksi-paket')}}">Transaksi Rental</a>
                <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
              </div>
              @else
              <div class="row mt-2 mb-2" style="height: 10px;">
                <a href="{{url('login')}}" class="btn btn-primary">LOGIN</a>

              </div> @endauth
          </li>




      </div>
      </ul>
    </div>

  </nav>
  @yield('content')




  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="#" class="logo">RAHMANA RENT - CAR</a></h2>
            <p>JAWA TIMUR</p>
            <!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul> -->
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">OUR PAGE</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Home</a></li>
              <li><a href="#" class="py-2 d-block">Order</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <div class="block-23 mb-3">
              <ul>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script><i class="icon-heart color-danger" aria-hidden="true"></i>RAHMANA RENT-CAR</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->


  <script src="{{asset('public/landingpage/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/popper.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/aos.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('public/landingpage/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('public/landingpage/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('public/landingpage/js/google-map.js')}}"></script>
  <script src="{{asset('public/landingpage/js/main.js')}}"></script>
  <script src="{{url('public/arfa/toastr')}}/toastr.min.js"></script>
  <script>
    toastr.options.timeOut = 1500;
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.closeMethod = 'slideUp';
    @if(session()->has('success'))
    toastr.success('{{session()->get("success")}}')
    @elseif(session()->has('error'))
    toastr.error('{{session()->get("error")}}')
    @endif
  </script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script>
    new DataTable('#myTable');
  </script>
  @stack('js')

</body>

</html>