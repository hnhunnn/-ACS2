<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
  <body>
    <!--=============================== HEADER ========================-->
    <header class="header">
      <div class="logo">
        <img src="../img/logo.png" alt="" />
      </div>
      <nav>
        <ul class="menu">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="#" class="active">Profile</a></li>
          <li><a href="#">Admin Pages</a></li>
        </ul>
      </nav>

      <div class="p3">
        <p>Hello!</p>
        <a href="#" class="dxuat">Đăng xuất</a>
      </div>
    </header>

    <div class="container">
      <div class="editP">
        <h2>Chỉnh sửa người dùng</h2>
      </div>

      <div class="tab-bar">
        <a href="#" class="active">THÔNG TIN CÁ NHÂN</a>
        <a href="#">LỊCH SỬ ĐẶT VÉ</a>
      </div>

      <!-- ==================== FORM ============================ -->
      <form>
        <div class="form-group">
          <label for="username">Tài khoản</label>
          <input type="text" id="username" value="" />
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" id="password" value="" />
        </div>
        <div class="form-group">
          <label for="phone">Số điện thoại</label>
          <input type="text" id="phone" value="" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" value="" />
        </div>
        <div class="form-group">
          <label for="fullname">Họ tên</label>
          <input type="text" id="fullname" value="" />
        </div>
        <button type="submit" class="save-button">Lưu</button>
      </form>
    </div>
  </body>
</html>

