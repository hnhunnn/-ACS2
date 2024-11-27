<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cinema Management')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <!--=============================== HEADER ========================-->
    <header class="header1">
        <div class="logo">
          <img src="../img/logo.png" alt="" />
        </div>
        <nav>
          <ul class="menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#" class="active">Profile</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav>
  
        <div class="p3">
          <p>Hello!</p>
          @if (Auth::check())
            <div class="dropdown">
                <button 
                    class="btn btn-secondary dropdown-toggle" 
                    type="button" 
                    id="dropdownMenuButton" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                </ul>
            </div>
            @else
            <a href="{{ route('loginU') }}" class='text-white' style='text-decoration: none'>Đăng nhập</a>
            @endif
        </div>
      </header>
    
    <!-- Content -->
    <div class="container">
        @yield('content')
    </div> 


    <!-- Footer -->
    <footer id="contact">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Welcome to HN & DL</p>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p><i class="fas fa-map-marker-alt"></i> 41 Hoàng Châu Ký, TP Đà Nẵng</p>
                <p><i class="fas fa-phone-alt"></i> 0935126931</p>
                <p><i class="fas fa-envelope"></i> honggnhungg@gmail.com</p>
                <p><i class="fas fa-envelope"></i> dieulinh@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100069911256288" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 HN & DL</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
