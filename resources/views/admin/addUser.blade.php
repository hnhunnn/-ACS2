@extends('layouts.admin')
@section('content')

<div class="content-wrapper" style="background-color: white">
    
    <div class="form-container" style="max-width: 500px; margin: 40px auto;">
        <form>
            <h2 class="mb-2 text-center">Thêm người dùng</h2>
          <div class="mb-2">
            <label for="username" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản">
          </div>
          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email">
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
          </div>
          <div class="mb-2">
            <label for="fullname" class="form-label">Họ tên</label>
            <input type="text" class="form-control" id="fullname" placeholder="Nhập họ tên">
          </div>
          <div class="mb-2">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
          </div>
          <div class="mb-2">
            <label for="userType" class="form-label">Loại người dùng</label>
            <select class="form-select" id="userType">
              <option value="Khách hàng">Khách hàng</option>
              <option value="Quản trị viên">Quản trị viên</option>
            </select>
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">
              <a href="{{ route('admin.dashboard') }}" class="text-white">Trở lại</a>
            </button>
            <button type="submit" class="btn btn-custom btn-success">Thêm</button>
          </div>
        </form>
      </div>
</div>
@endsection
