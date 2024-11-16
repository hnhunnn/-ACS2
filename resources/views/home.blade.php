<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Admin Pages</a></li>
                </ul>
            </nav>

            <div class="p3">
                <p>Hello!</p>

                <a href="#" class="dxuat">Đăng xuất</a>
            </div>
        </header>
        <!--=============================== BANNER ========================-->
        <div class="bantaydietquy">
            <img src="../img/bantaydietquy.jpg" alt="" />
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
            <div class="card-container">
                <button class="carousel-btn left" id="left1" onclick="scrollLeft()">
                    &#10094;
                </button>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <button class="carousel-btn right" id="right1" onclick="scrollRight()">
                    &#10095;
                </button>
            </div>
            <!--------------------------list film 2-------------------->
            <div class="card-container">
                <button class="carousel-btn left" id="left2" onclick="scrollLeft2()">
                    &#10094;
                </button>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <div class="card" style="width: 16rem">
                    <img src="../img/latmat6.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>

                <div class="card" style="width: 16rem">
                    <img src="../img/buoihencuaCarl.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#" class="btn-primary datveBtn">ĐẶT VÉ</a>
                    </div>
                </div>
                <button class="carousel-btn right" id="right2" onclick="scrollRight2()">
                    &#10095;
                </button>
            </div>
        </div>
        <!--====================== CINEMA,BRANCH,SCHEDULE ===================-->
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
                {{-- @foreach ($branches as $branch) --}}
                <div class="branch-item" onclick="showSchedules(branch_id)">
                    <!-- Nội dung của chi nhánh -->
                </div>
                {{-- @endforeach --}}

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


        <!--=============================== SCRIPT ========================-->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="{{ asset('../js/home.js') }}">
            src =
                "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js ";
            integrity =
                "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz";
            crossorigin = "anonymous";
        </script>
    </div>
</body>

</html>
