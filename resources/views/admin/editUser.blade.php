@extends('layouts.admin')

@section('content')
    <div class="content-wrapper" style="background-color: white">
        <div class="form-container" style="max-width: 500px; margin: 40px auto;">
            <!-- Form chỉnh sửa người dùng -->
            <form action="{{ route('admin.updateUser', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-2">
                    <label for="username" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ old('username', $user->username) }}">
                </div>

                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}">
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>

                <div class="mb-2">
                    <label for="fullname" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname"
                        value="{{ old('fullname', $user->fullname) }}">
                </div>

                <div class="mb-2">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="mb-2">
                    <label for="userType" class="form-label">Loại người dùng</label>
                    <select class="form-select" id="userType" name="userType">
                        <option value="Khách hàng" {{ $user->user_type == 'Khách hàng' ? 'selected' : '' }}>Khách hàng
                        </option>
                        <option value="Quản trị viên" {{ $user->user_type == 'Quản trị viên' ? 'selected' : '' }}>Quản trị
                            viên</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
