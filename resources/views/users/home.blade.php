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
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class=wrapper>
        <!--=============================== HEADER ========================-->
        <header class="header">
            <div class="logo">
                <img src="../img/lgo.png" alt="" />
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('profile') }}">Thông tin</a></li>
                    <li><a href="#contact">Liên hệ</a></li>
                </ul>
            </nav>

            <div class="p3">
                <p>Xin chào!</p>

                @if (Auth::check())
                    <div class="dropdown" id="dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" id="dxuat">Đăng xuất</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('loginU') }}" style='text-decoration: none ; color:green '>Đăng nhập</a>
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
                <button type="submit" class="btn btn-light"><b>PHIM ĐANG CHIẾU</b></button>
                <button type="submit" class="btn" style="background-color: #91D9BF">
                    <b>PHIM SẮP CHIẾU</b>
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
                <form action="{{ route('home') }}" method="GET" style="display: inline-block;">
                    <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">
                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                        <img src="{{ asset($cinema->logo) }}" alt="Logo of {{ $cinema->cinemaName }}"
                            style="width: 100px;">
                    </button>
                </form>
            @endforeach
        </div>

        <div class="branch-details">
            <h3>Chi nhánh</h3>
            @if (!empty($branches))
                @foreach ($branches as $branch)
                    <form action="{{ route('home') }}" method="GET" class="branch-item">
                        <input type="hidden" name="cinema_id" value="{{ request('cinema_id') }}">
                        <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                            <div >
                                <h4>{{ $branch->branchName }}</h4>
                                <p>{{ $branch->address }}</p>
                            </div>
                        </button>
                    </form>
                @endforeach
            {{-- @else
                <p></p> --}}
            @endif
        </div>

        <div class="schedule-details">
            <h3>Giờ chiếu</h3>
            @if (!empty($schedules))
                @foreach ($schedules as $schedule)
                    <div class="schedule-item">
                        @foreach ($schedule->showtime as $item)
                            <p>{{ $item }}</p>
                        @endforeach

                    </div>
                @endforeach
            {{-- @else
                <p></p> --}}
            @endif
        </div>

    </div>
        <!--=============================== FOOTER ========================-->
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
