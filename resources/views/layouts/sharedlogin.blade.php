<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Panutun Kasarasan - Guide to Well-being">
  <meta name="author" content="Panutun Kasarasan">

  <title>Panutun Kasarasan | Guide to Well-being</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/logotitle.png') }}" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/icofont/icofont.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/animate/animate.min.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
    :root {
      --green: #9CAF88;
      --gold: #E3C16F;
      --brown: #6B4B33;
      --terracotta: #A1653B;
      --cream: #F8F3E9;
    }
    body {
      background: var(--cream) !important;
      color: var(--brown);
    }
    .header-top-bar.bg-gradient {
      background: linear-gradient(90deg, var(--terracotta) 0%, var(--gold) 100%)!important;
    }
    .navbar, .footer, .footer-bottom {
      background: var(--cream)!important;
    }
    .navbar-nav .nav-link,
    .top-bar-info a,
    .footer-widget,
    .footer-menu a,
    .copyright {
      color: var(--brown)!important;
    }
    .navbar-nav .nav-item.active .nav-link, 
    .navbar-nav .nav-link:hover {
      color: var(--terracotta)!important;
      font-weight: 600;
    }
    .navbar-brand img,
    .footer-logo {
      background: #fff8;
      border-radius: 1em;
      box-shadow: 0 2px 12px -4px #a1653b33;
    }
    .btn-main-2,
    .btn.btn-main-2 {
      background: linear-gradient(90deg, var(--brown) 0%, var(--terracotta) 100%);
      color: #fff!important;
      border: none;
    }
    .btn.btn-main-2:hover, .btn.btn-main-2:focus {
      background: linear-gradient(90deg, var(--gold) 0%, var(--green) 100%);
      color: var(--brown)!important;
    }
    .back-to-top {
      background: var(--terracotta);
      color: #fff;
      border-radius: 50%;
      border: 2px solid var(--gold);
      right: 24px;
      bottom: 24px;
    }
    .back-to-top:hover {
      background: var(--gold);
      color: var(--brown)!important;
      border-color: var(--terracotta);
    }
    .footer-widget h6 {
      color: var(--brown)!important;
    }
    .footer-socials a {
      color: var(--terracotta)!important;
      background: var(--gold);
      border-radius: 50%;
      width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;
      transition: background 0.2s, color 0.2s;
    }
    .footer-socials a:hover {
      color: #fff!important;
      background: var(--terracotta);
    }
    .footer {
      border-top: 2px solid var(--gold);
    }
  </style>

</head>

<body id="top" class="antialiased">

<!-- Preloader -->
<div id="preloader">
  <div class="loader"></div>
</div>

<!-- Header Start -->
<header class="header-wrapper">
  <div class="header-top-bar bg-gradient">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <ul class="top-bar-info list-inline-item pl-0 mb-0">
            <li class="list-inline-item">
              <a href="mailto:info@panuntunkasarasan.com">
                <i class="icofont-envelope mr-2"></i>info@panuntunkasarasan.com
              </a>
            </li>
            <li class="list-inline-item">
              <i class="icofont-location-pin mr-2"></i>Yogyakarta, Indonesia
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
            <a href="tel:+62-877-3903-5397">
              <i class="icofont-phone-circle mr-2"></i>
              <span>Hotline: </span>
              <span class="font-weight-bold">+62 877-3903-5397</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navigation nav-transparent" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('main') }}">
        <img src="{{ asset('assets/images/@Logo lomba.png') }}" alt="Panutun Kasarasan Logo" class="img-fluid main-logo" style="max-width: 150px;">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain">
        <span class="icofont-navigation-menu"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarmain">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('main') }}">Home</a>
          </li>
          <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-main-2 btn-round-full" href="{{ route('user.login') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- Header End -->

<main>
  @yield('content')
</main>

<!-- Footer Start -->
<footer class="footer section bg-gray-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="footer-widget">
          <h6 class="mb-4 text-capitalize">About Panuntun Kasarasan</h6>
          <p class="text-muted mb-4" style="color: var(--brown)!important;">Perjalanan kesehatan Anda, panduan kami. Bersama Panuntun Kasarasan, rasakan pendampingan terbaik menuju kesejahteraan.</p>
          <p class="mb-2"><i class="icofont-location-pin mr-2"></i>Jl. Laksda Adisucipto No.32-34, Demangan, Yogyakarta</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-5">
        <div class="footer-widget">
          <h6 class="mb-4">Quick Links</h6>
          <ul class="list-unstyled footer-menu">
            <li><a href="{{ route('main') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="footer-widget">
          <div class="mb-4">
            <img src="{{ asset('assets/images/@Logo lomba.png') }}" alt="Panutun Kasarasan" class="img-fluid footer-logo" style="max-width: 120px;">
          </div>
          <ul class="list-inline footer-socials">
            <li class="list-inline-item">
              <a href="#" data-toggle="tooltip" title="Follow us on Facebook"><i class="icofont-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" data-toggle="tooltip" title="Follow us on Twitter"><i class="icofont-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" data-toggle="tooltip" title="Follow us on LinkedIn"><i class="icofont-linkedin"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" data-toggle="tooltip" title="Follow us on Instagram"><i class="icofont-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom" style="background: var(--gold);">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="copyright text-center" style="color: var(--brown)!important;">
            <p class="mb-0">&copy; {{ date('Y') }} Panuntun Kasarasan. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#top" class="back-to-top" id="backToTop" data-toggle="tooltip" title="Back to Top">
  <i class="icofont-simple-up"></i>
</a>

<!-- Essential Scripts -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/plugins/wow/wow.min.js') }}"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="{{ asset('assets/js/map.js') }}"></script>

<!-- Custom Script -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>