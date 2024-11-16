<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="login-container">

        <div class="login-form">
            <form class="user" action="login.php" method="post">
                <h1>Đăng Nhập</h1>
                <div class="form-group">
                    <label for="exampleInputEmail">Tài khoản</label>
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nhập tài khoản" name="user_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Mật khẩu</label>
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nhập mật khẩu" name="user_pass">
                    <a href="#">Quên mật khẩu?</a>
                </div>
            
                <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                <hr>
            </form>
        </div>

        <!-- hình ảnh -->
        <div class="dangnhap"></div>
    </div>

</body>
</html>