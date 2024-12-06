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
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <!--=============================== HEADER ========================-->
    <header class="header1">
        <div class="logo">
          <img src="../img/lgo.png" alt="" />
        </div>
        <nav>
          <ul class="menu">
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="#" class="active">Thông tin</a></li>
            <li><a href="#contact">Liên hệ</a></li>
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
                    <li><a class="dropdown-item" href="{{ route('logout') }}" style='color:green'>Đăng xuất</a></li>
                </ul>
            </div>
            @else
            <a href="{{ route('loginU') }}" style='text-decoration: none ; color:green'>Đăng nhập</a>
            @endif
        </div>
      </header>
    
    <!-- Content -->
    <div class="container">
        @yield('content')
    </div> 


    <!-- Footer -->
    <section class="footer">
        <div class="container">
            <div class="sec aboutus">
                <div class="logo-container">
                    <img src="../img/HN&DL.png" alt="Footer Logo">
                </div>
         
            </div>

            <div class="sec quicklinks">
                <h2>Về chúng tôi</h2>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Phim</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>

            <div class="sec quicklinks">
                <h2>Hỗ trợ khách hàng</h2>
                <ul>
                    <li><a href="#">Giúp đỡ</a></li>
                    <li><a href="#">Liên lạc</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                </ul>
            </div>

            <div class="sec contact">
                <h2>Liên hệ chúng tôi</h2>
                <ul class="info">
                    <li>
                        <span><i class='bx bxs-phone-call'></i></span>
                        <p><a href="tel:+12345678900">+1 234 567 8900</a></p>
                    </li>
                    <li>
                        <span><i class='bx bxs-envelope'></i></span>
                        <p><a href="mailto:hn&dl@gmail.com">hn&dl@gmail.com</a></p>
                    </li>
                </ul>
                <ul class="sci">
                    <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                    <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                    <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                    <li><a href="#"><i class='bx bxl-youtube'></i></a></li>
                </ul>
            </div>
        </div>
    </section>  

    <div class="copyrightText">
        <p>&copy;Bản quyền thuộc về HN & DL | Cung cấp bởi DieuLinh</p>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
