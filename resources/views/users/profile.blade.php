<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <li><a href="#">Thông tin</a></li>
            </ul>
        </nav>

        <div class="p3">
            <p style='margin-top: 10px'>Xin chào!</p>
            
        </div>
    </header>
    <div class="nen">
        <br>
        <div class="container">
            <div class="tab-bar">
                <a href="#" class="active">THÔNG TIN CÁ NHÂN</a>
                <a href="#">LỊCH SỬ ĐẶT VÉ</a>
            </div>
            <!-- ==================== FORM THÔNG TIN  ============================ -->
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" id="username" name="username" value="{{ $user->username }}" />
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" value="" style="" />
                        <span id="togglePassword"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fullname">Họ tên</label>
                    <input type="text" id="fullname" name="fullname" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="{{ $user->phone }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" />
                </div>
                <button type="submit" class="save-button" id="saveButton">Lưu</button>
            </form>


        </div>
    </div>
</body>
{{-- hiển thị thông báo thành công --}}
@if (session('success'))
    <script>
        window.onload = function() {
            Swal.fire({
                title: 'Thành công!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
@endif
{{-- con mắt hiển thị mật khẩukhẩu --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);

            // Thay đổi icon
            this.querySelector("i").classList.toggle("fa-eye");
            this.querySelector("i").classList.toggle("fa-eye-slash");
        });

    });
</script>

</html>
