<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../css/register.css" />
  </head>
  <body>
    <div class="register">
      <div class="bentrai">
        <h1 class="dki">Đăng ký</h1>
        <br>
        <br><br>
        <!-- form đăng ký  -->
        <form>
          <div class="input-group">
            <label for="tkhoan" class="tkhoan">Tên tài khoản</label>
            <input type="text" placeholder="Nhập tài khoản" id="tkhoan" name="tkhoan"/>
          </div>

          <div class="input-group">
            <label for="mkhau1" class='email' >Email</label>
            <input type="email" placeholder="linh@gmail.com" id="email" name="email"/>
          </div>

          <div class="input-group">
            <label for="password" class="mkhau1">Mật khẩu</label>
            <input type="password" placeholder="********" id="mkhau1" name="mkhau1"/>
          </div>

          <div class="input-group">
            <label for="name" class="mkhau2">Nhập lại mật khẩu</label>
            <input type="text" placeholder="Nhập lại mật khẩu" id="mkhau2" name="mkhau2"/>
          </div>                
        </form> 
        <br> <br>
        <!-- Nút submit -->
        <button type="submit">Xác nhận</button> 
        <br><br><br>
        <hr><br>
        <p>Bạn đã có tài khoản <a href="{{ route('login') }}">Đăng nhập ? </a> </p>       
      </div>
      <div class="benphai">
      </div>
    </div>
  </body>
</html>


