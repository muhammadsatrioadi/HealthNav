<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="HealthNav - Your Trusted Healthcare Navigation Partner">
  <meta name="author" content="HealthNav">

  <title>HealthNav</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icofont/icofont.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/slick-carousel/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- Required CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    /* Navbar Styles */
    .navbar {
      background-color: #ffffff;
      box-shadow: none;
      border-bottom: 1px solid #e5e7eb;
      padding: 0.5rem 0;
    }
    
    .navbar.scrolled {
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: 600;
      color: #111827 !important;
      padding: 0;
    }
    
    .navbar-brand img {
      height: 35px;
      margin-right: 8px;
    }
    
    .navbar-brand span {
      font-size: 1.25rem;
      color: #111827;
      -webkit-text-fill-color: initial;
      background: none;
      font-family: 'Poppins', sans-serif;
    }
    
    .nav-link {
      color: #4b5563 !important;
      font-weight: 500;
      padding: 0.5rem 1rem;
      font-size: 0.95rem;
      transition: color 0.2s ease;
    }
    
    .nav-link:hover {
      color: #111827 !important;
    }
    
    .nav-link::after {
      display: none;
    }

    /* Search Bar */
    .navbar .search-box {
      position: relative;
      margin-right: 1rem;
    }

    .navbar .search-input {
      padding: 0.5rem 1rem 0.5rem 2.5rem;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      width: 250px;
      font-size: 0.9rem;
      color: #4b5563;
    }

    .navbar .search-icon {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
      font-size: 0.9rem;
    }

    /* User Profile */
    .navbar .user-profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      overflow: hidden;
    }

    .navbar .user-profile img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Remove header top bar */
    .header-top-bar {
      display: none;
    }

    /* Admin Sidebar */
    .admin-sidebar {
      min-height: 100vh;
      background: #26355D;
      color: white;
    }

    .admin-sidebar .nav-link {
      color: white !important;
      padding: 0.5rem 1rem;
      margin: 0.2rem 0;
    }

    .admin-sidebar .nav-link:hover {
      background: rgba(255,255,255,0.1);
    }
    
    /* Layout */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1 0 auto;
      min-height: calc(100vh - 60px - 400px); /* Adjust based on footer height */
      padding-bottom: 3rem; /* Add padding to prevent content from touching footer */
    }

    .admin-sidebar,
    .main-content {
      min-height: 100vh;
    }

    .container {
      max-width: 100%;
      padding-left: 1rem;
      padding-right: 1rem;
    }

    /* Main Content */
    .main-content {
      min-height: calc(100vh - 60px);
      padding-top: 60px;
    }
    
    /* Footer Styles */
    .footer {
      flex-shrink: 0;
      background-color: #26355D;
      color: white;
      padding: 2rem 0;
      width: 100%;
      position: relative;
      bottom: 0;
      left: 0;
      z-index: 10;
    }
    
    .footer-logo img {
      height: 50px;
      margin-bottom: 1rem;
    }
    
    .footer-links {
      list-style: none;
      padding: 0;
    }
    
    .footer-links li {
      margin-bottom: 0.5rem;
    }
    
    .footer-links a {
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-links a:hover {
      color: #4A90E2;
    }
    
    .social-links a {
      color: white;
      margin-right: 1rem;
      font-size: 1.5rem;
      transition: all 0.3s ease;
    }
    
    .social-links a:hover {
      color: #4A90E2;
      transform: translateY(-3px);
    }

    /* User Profile Dropdown */
    .navbar .user-profile-dropdown {
      display: flex;
      align-items: center;
      padding: 8px 12px;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
      background: white;
      min-width: 160px;
    }

    .navbar .user-profile-dropdown:hover {
      border-color: #d1d5db;
      background: #f9fafb;
    }

    .navbar .user-profile-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar .user-profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      overflow: hidden;
    }

    /* Chatbot Styles */
    .chatbot-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }

    .chatbot-toggle-btn {
        background: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .chatbot-toggle-btn:hover {
        background: #0056b3;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
        transform: translateY(-2px);
    }

    .chatbot-window {
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 350px;
        height: 450px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: absolute;
        bottom: 80px; /* Above the toggle button */
        right: 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease-in-out;
    }

    .chatbot-window.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .chatbot-header {
        background: #007bff;
        color: white;
        padding: 1rem;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .chatbot-header .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .chatbot-messages {
        flex-grow: 1;
        padding: 1rem;
        overflow-y: auto;
        background: #f8f9fa;
        display: flex;
        flex-direction: column;
    }

    .chat-message {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        max-width: 85%;
        word-wrap: break-word;
        display: inline-block;
        clear: both;
    }

    .chat-message.user {
        background: #e9f7ff;
        color: #0056b3;
        align-self: flex-end;
        margin-left: auto;
        border-bottom-right-radius: 2px;
        text-align: right;
    }

    .chat-message.bot {
        background: #f0f0f0;
        color: #333;
        align-self: flex-start;
        margin-right: auto;
        border-bottom-left-radius: 2px;
        text-align: left;
    }

    .chatbot-input-area {
        display: flex;
        padding: 1rem;
        border-top: 1px solid #eee;
        background: #fff;
    }

    .chatbot-input-area input {
        flex-grow: 1;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        margin-right: 0.5rem;
    }

    .chatbot-input-area button {
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 0.75rem 1rem;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .chatbot-input-area button:hover {
        background: #0056b3;
    }

    @media (max-width: 991.98px) { /* For Bootstrap's lg breakpoint */
      .navbar-collapse.show.mobile-nav-override {
        background-color: #ffffff !important; /* Ensure solid background */
        position: fixed !important; /* Position fixed relative to viewport */
        top: 60px !important; /* Position below fixed navbar, adjust if navbar height changes */
        left: 0 !important;
        width: 100% !important;
        height: calc(100vh - 60px) !important; /* Take full viewport height minus navbar height */
        padding: 1rem !important; /* Add some padding for better look */
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
        z-index: 1039 !important; /* Ensure it's above other content */
        overflow-y: auto !important; /* Allow scrolling if content is long */
      }

      .mobile-nav-override .navbar-nav {
        flex-direction: column !important; /* Stack nav items vertically */
        width: 100% !important;
      }

      .mobile-nav-override .nav-item {
        width: 100% !important;
      }

      .mobile-nav-override .search-box {
        margin-right: 0 !important;
        margin-top: 1rem !important;
        width: 100% !important;
      }

      .mobile-nav-override .search-input {
        width: 100% !important;
      }

      .mobile-nav-override .ms-auto {
        margin-left: 0 !important;
      }

      .mobile-nav-override .d-flex.align-items-center {
        flex-direction: column !important;
        align-items: flex-start !important;
      }

      .mobile-nav-override .dropdown {
        width: 100% !important;
        margin-top: 1rem !important;
      }

      .mobile-nav-override .user-profile-dropdown {
        width: 100% !important;
        justify-content: space-between !important;
      }

      .mobile-nav-override .dropdown-menu {
        position: static !important; /* Remove absolute positioning for dropdown menu in collapsed navbar */
        width: 100% !important;
        transform: none !important;
        margin-top: 0.5rem !important;
      }
    }
  </style>

  @stack('styles')
</head>

<body id="top" class="antialiased">

<!-- Preloader -->
<div id="preloader">
  <div class="loader"></div>
</div>

<!-- Header Start -->
<header class="header-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('main') }}">
        <img src="{{ asset('assets/images/logo.png') }}" alt="HealthNav Logo">
        <span>HealthNav</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mobile-nav-override" id="navbarNav">
        <ul class="navbar-nav">
          @if(!Auth::check() || Auth::user()->role !== 'admin')
            <li class="nav-item">
              @auth
                <a class="nav-link" href="{{ route('user.dashboard') }}">Home</a>
              @else
                <a class="nav-link" href="{{ route('main') }}">Home</a>
              @endauth
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('hospitals.index') }}">Hospital</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          @endif
        </ul>
        <div class="ms-auto d-flex align-items-center">
          <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search...">
          </div>
          @auth
            <div class="dropdown">
              <button class="user-profile-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-profile-wrapper">
                  <div class="user-profile">
                    <img src="{{ asset('assets/images/user.jpg') }}" alt="User Profile">
                  </div>
                  <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="{{ route('user.profile.show') }}">
                    <i class="fas fa-user"></i> My Profile
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a class="nav-link" href="{{ route('user.login') }}">Login</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- Header End -->

<main>
  <div class="main-content">
    @if(auth()->check() && auth()->user()->is_admin && request()->is('admin*'))
      <div class="container-fluid">
        <div class="row">
          <!-- Admin Sidebar -->
          <div class="col-md-3 col-lg-2 admin-sidebar">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.hospitals.index') }}">
                    <i class="fas fa-hospital"></i> Hospitals
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i> Users
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.registrations.index') }}">
                    <i class="fas fa-clipboard-list"></i> Registrations
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Admin Content -->
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            @yield('content')
          </main>
        </div>
      </div>
    @else
      <div class="container main-content">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @yield('content')
      </div>
    @endif
  </div>
</main>

<!-- Footer Start -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="footer-logo">
          <img src="{{ asset('assets/images/logo.png') }}" alt="HealthNav Logo" style="filter: brightness(0) invert(1);">
          <p>Your trusted partner in medical tourism. We provide comprehensive medical check-up packages combined with exciting tourism experiences.</p>
        </div>
      </div>
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="footer-links">
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('hospitals.index') }}">Our Hospitals</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Connect With Us</h5>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/healthnav1?igsh=MWhiaDA0YWRiZTMxbw=="><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="mt-3">
          <p><i class="fas fa-phone"></i> +62 274 123456</p>
          <p><i class="fas fa-envelope"></i> info@healthnav.com</p>
          <p><i class="fas fa-map-marker-alt"></i> Yogyakarta, Indonesia</p>
        </div>
      </div>
    </div>
    <hr class="mt-4" style="border-color: rgba(255,255,255,0.1);">
    <div class="text-center mt-4">
      <p>&copy; {{ date('Y') }} HealthNav. All rights reserved.</p>
    </div>
  </div>
</footer>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#top" class="back-to-top" id="backToTop" data-toggle="tooltip" title="Back to Top">
  <i class="icofont-simple-up"></i>
</a>

<!-- Essential Scripts -->
<script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/plugins/counterup/jquery.easing.js') }}"></script>
<script src="{{ asset('assets/plugins/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="{{ asset('assets/plugins/google-map/map.js') }}"></script>

<!-- Custom Script -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script>
  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      document.querySelector('.navbar').classList.add('scrolled');
    } else {
      document.querySelector('.navbar').classList.remove('scrolled');
    }
  });
</script>

<script>
// Preloader
window.addEventListener('load', function() {
  const preloader = document.getElementById('preloader');
  preloader.classList.add('fade-out');
  setTimeout(() => {
    preloader.style.display = 'none';
  }, 500);
});

// Prevent form resubmission on refresh
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>

@stack('scripts')

<!-- Chatbot HTML -->
<div class="chatbot-container">
  <button class="chatbot-toggle-btn" id="chatbot-toggle-btn"><i class="fas fa-comments"></i></button>
  <div class="chatbot-window" id="chatbot-window">
    <div class="chatbot-header">
      <span>Chatbot</span>
      <button class="close-btn" id="chatbot-close-btn">&times;</button>
    </div>
    <div class="chatbot-messages" id="chatbot-messages"></div>
    <div class="chatbot-input-area">
      <input type="text" id="chatbot-input" placeholder="Type your message..." autocomplete="off" />
      <button id="chatbot-send-btn">Send</button>
    </div>
  </div>
</div>

<!-- Chatbot JavaScript -->
<script>
  $(document).ready(function() {
    const chatbotToggleBtn = $('#chatbot-toggle-btn');
    const chatbotWindow = $('#chatbot-window');
    const chatbotCloseBtn = $('#chatbot-close-btn');
    const chatbotInput = $('#chatbot-input');
    const chatbotSendBtn = $('#chatbot-send-btn');
    const chatbotMessages = $('#chatbot-messages');

    // Focus input when chatbot opens
    function openChatbot() {
      chatbotWindow.addClass('active');
      setTimeout(() => {
        chatbotInput.focus();
      }, 200);
    }

    chatbotToggleBtn.on('click', function() {
      if (chatbotWindow.hasClass('active')) {
        chatbotWindow.removeClass('active');
      } else {
        openChatbot();
      }
    });

    chatbotCloseBtn.on('click', function() {
      chatbotWindow.removeClass('active');
    });

    chatbotSendBtn.on('click', sendMessage);
    chatbotInput.on('keypress', function(e) {
      if (e.which === 13) {
        sendMessage();
      }
    });

    function sendMessage() {
      const message = chatbotInput.val().trim();
      if (message === '') return;

      appendMessage(message, 'user');
      chatbotInput.val('');
      chatbotInput.focus();

      // Simulate bot response (replace with AJAX for real bot)
      setTimeout(() => {
        appendMessage(getBotResponse(message), 'bot');
      }, 700);
    }

    function appendMessage(message, sender) {
      const messageElement = $('<div class="chat-message ' + sender + '"></div>');
      if (sender === 'bot') {
        messageElement.html(message);
      } else {
        messageElement.text(message);
      }
      chatbotMessages.append(messageElement);
      chatbotMessages.scrollTop(chatbotMessages[0].scrollHeight);
    }

    // Define Laravel routes for use in JavaScript
    const laravelRoutes = {
      hospitalsSelection: "{{ route('hospitals.selection') }}",
      mcuHistory: "{{ route('user.mcu.history') }}",
      profileEdit: "{{ route('user.profile.edit') }}",
      hospitalsIndex: "{{ route('hospitals.index') }}"
    };

    function getBotResponse(message) {
      const lowerCaseMessage = message.toLowerCase();
      for (const key in botResponses) {
        if (lowerCaseMessage.includes(key)) {
          return botResponses[key];
        }
      }
      return botResponses['default'];
    }

    const botResponses = {
      'halo': 'Halo! Ada yang bisa saya bantu?',
      'bantuan': 'Tentu, apa yang ingin Anda tanyakan? Anda bisa bertanya tentang <a href="' + laravelRoutes.mcuHistory + '">riwayat MCU</a>, <a href="' + laravelRoutes.hospitalsIndex + '">daftar rumah sakit</a>, atau <a href="' + laravelRoutes.profileEdit + '">mengelola profil Anda</a>.',
      'paket mcu': 'Kami punya paket Basic, Pro, dan Enterprise. Anda bisa <a href="' + laravelRoutes.hospitalsSelection + '">memesan MCU baru di sini</a>.',
      'rumah sakit': 'Anda bisa melihat daftar rumah sakit mitra kami di halaman <a href="' + laravelRoutes.hospitalsIndex + '">Rumah Sakit</a>.',
      'profil': 'Untuk mengelola profil Anda, silakan kunjungi halaman <a href="' + laravelRoutes.profileEdit + '">Profil Saya</a>.',
      'riwayat mcu': 'Anda dapat melihat riwayat Medical Check-Up Anda di halaman <a href="' + laravelRoutes.mcuHistory + '">Riwayat MCU</a>.',
      'terima kasih': 'Sama-sama! Senang bisa membantu.',
      'default': 'Maaf, saya belum memahami pertanyaan Anda. Bisakah Anda bertanya dengan cara lain?'
    };

    // Initial bot message and suggested questions
    appendMessage('Halo! Saya HealthNav Bot. Ada yang bisa saya bantu?', 'bot');
    appendMessage('Anda bisa mencoba bertanya:' +
                  '<ul>' +
                  '<li>Apa saja paket MCU?</li>' +
                  '<li>Dimana saya bisa melihat daftar rumah sakit?</li>' +
                  '<li>Bagaimana cara mengelola profil saya?</li>' +
                  '<li>Bagaimana cara melihat riwayat MCU?</li>' +
                  '<li>Terima kasih</li>' +
                  '</ul>',
                  'bot');
  });
</script>
</body>
</html>