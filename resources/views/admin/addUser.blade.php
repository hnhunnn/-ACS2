@extends('layouts.admin')
@section('content')

<div class="content-wrapper" style="background-color: white">
    
    <div class="form-container" style="max-width: 500px; margin: 40px auto;">
      <form method="POST" action="{{ route('admin.storeUser') }}">
        @csrf <!-- Bảo vệ CSRF -->
        <h2 class="mb-2 text-center">Thêm người dùng</h2>
        <div class="mb-2">
            <label for="username" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tài khoản">
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
        </div>
        <div class="mb-2">
          <label for="name" class="form-label">Họ tên</label> <!-- Thay fullname bằng name -->
          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" value="{{ old('name') }}">
      </div>      
        <div class="mb-2">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
        </div>
        <div class="mb-2">
            <label for="userType" class="form-label">Loại người dùng</label>
            <select class="form-select" id="userType" name="userType">
                <option value="Khách hàng">Khách hàng</option>
                <option value="Quản trị viên">Quản trị viên</option>
            </select>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary text-white">Trở lại</a>
            <button type="submit" class="btn btn-success">Thêm</button>
        </div>
    </form>
    
      </div>
</div>
@endsection
