<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>ResetPass</title>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #2c3e50;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    
        form label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #ecf0f1;
            font-weight: bold;
        }
    
        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            background-color: #fdfdfd;
            color: #000000;
        }
    
        form input:focus {
            border-color: #f39c12;
            outline: none;
            background-color: #ffffff;
        }
    
        form .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    
        form button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        form button:hover {
            background-color: #e67e22;
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
<br> <br>
<div class="container">
    <form method="POST" action="{{ route('resetPass') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn-submit">Đặt lại mật khẩu</button>
    </form>
</div> 
<br> <br>
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
