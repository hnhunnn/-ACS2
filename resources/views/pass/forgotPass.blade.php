<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>ForgotPass</title>
    <style>
        .container{
            padding: 20px;
            color:#545151;
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #fcfcfc;
        }
        span {
            color: red;
            font-size: 12px;
        }
        input[type="email"] {
            padding: 10px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            
    }
     </style>
</head>
<body>
   
        <!--=============================== HEADER ========================-->
        <header class="header">
            <div class="logo">
                <img src="../img/lgo.png" alt="" />
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    
                </ul>
            </nav>

            <div class="p3">
                <p>Xin chào!</p>
            </div>
        </header>     

<div class="container" >
    <h2>Quên mật khẩu</h2>
    <form method="POST" action="{{ route('forgot') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
            <br><button type="submit">Đặt lại mật khẩu</button>
    </form>
            @if(session('status'))
                <p style="color: green;">{{ session('status') }}</p>
            @endif     
</div>
<!--=============================== FOOTER ========================-->
<section id="contact" class="footer">
    <div class="container">
        <div class="sec aboutus">
            <div class="logo-container">
                <img src="../img/bap.png" alt="Footer Logo">
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
</body>
</html>