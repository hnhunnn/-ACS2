<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class=wrapper>
        <!--=============================== HEADER ========================-->
        <header class="header">
            <div class="logo">
                <img src="../img/logo.png" alt="" />
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
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
            <a href="{{ route('loginU') }}"  style='text-decoration: none ; color:green '>Đăng nhập</a>
            @endif
                
            </div>
        </header>
        <!--=============================== BANNER ========================-->
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="1000">
                <img src="../img/bantaydietquy.jpg" class="d-block w-100" alt="Image 1">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../img/bantaydietquy.jpg" class="d-block w-100" alt="Image 2">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../img/bantaydietquy.jpg" class="d-block w-100" alt="Image 3">
              </div>
            </div>
          </div>

        <!--=============================== LIST FILM ========================-->
        <div class="ticket">
            <!-- button đang chiếu và sắp chiếu  -->
            <div class="button-chieu">
                <button type="submit" class="btn btn-light">Đang chiếu</button>
                <button type="submit" class="btn" style="background-color: #008080">
                    Sắp chiếu
                </button>
            </div>
            <!------------------List phim  1------------------------>
   
            <div class="movie-grid">
                <button class="scroll-button left" id='left' onclick="scrollLeft()">&#10094;</button>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 1">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/nhabanu.jpg" alt="Movie 2">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/bogia.png" alt="Movie 3">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 4">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 5">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 6">
                    <button>Đặt Vé</button>
                </div>
            </div>
            <button class="scroll-button right" id='right'onclick="scrollRight()">&#10095;</button>

            <!------------------List phim  2------------------------>
            <div class="movie-grid">
                <button class="scroll-button left" id='left2' onclick="scrollLeft2()">&#10094;</button>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 1">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 2">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 3">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 4">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 5">
                    <button>Đặt Vé</button>
                </div>
                <div class="movie-card">
                    <img src="../img/inside2.png" alt="Movie 6">
                    <button>Đặt Vé</button>
                </div>
            </div>
            <button class="scroll-button right" id='right2'onclick="scrollRight2()">&#10095;</button>
        </div>
         
        
        <!--====================== CINEMA,BRANCH,SCHEDULE ===================-->
        <div class="ba">
            <div class="cinema-list">
                <h3>Danh sách rạp</h3>
                @foreach ($cinemas as $cinema)
                    <div class="cinema-item" onclick="showBranches({{ $cinema->id }})">
                        <img src="{{ asset($cinema->logo) }}" alt="">
                    </div>
                @endforeach
            </div>

            <div class="branch-details">
                <h3>Chi nhánh</h3>
                <div id="branch-container" style="display: none;">
                    <!-- Danh sách chi nhánh sẽ được tải vào đây bằng JavaScript -->
                    <div class="branch-item" onclick="showSchedules(branch_id)">
                        <!-- Nội dung của chi nhánh -->
                    </div>
                </div>
            </div>

            <div class="schedule-details">
                <h3>Giờ chiếu</h3>
                <div id="schedule-container">
                    <!-- Giờ chiếu sẽ được tải vào đây bằng JavaScript -->
                    <div class="schedule-item">
                    </div>
                </div>
            </div>
        </div>
       <!--=============================== FOOTER ========================-->
       <div  id="contact">
            <footer>
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
        </div>
    </div>

   

    <!--=============================== SCRIPT ========================-->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="{{ asset('../js/home.js') }}">
            src =
                "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js ";
            integrity =
                "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz";
            crossorigin = "anonymous";
        </script>
</body>

</html>
