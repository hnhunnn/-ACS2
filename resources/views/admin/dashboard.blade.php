@extends('layouts.admin')

@section('content')
<div class="content-wrapper" style="background-color: white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý người dùng </h1>
            </div><!-- /.col --> 
            
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class='add' >
        <a href="{{ route('admin.addUser') }}">Thêm người dùng</a>
        </div>
        <br>
        <div>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Nhập thông tin người dùng">
            <button class="search-button">
                <img src="https://img.icons8.com/ios-filled/24/FFFFFF/search--v1.png" alt="Search Icon">
            </button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Loại người dùng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dòng dữ liệu mẫu -->
                    <tr>
                        <td>1</td>
                        <td>Hồ Thị Hồng nhung </td>
                        <td>Hồng Nhung</td>
                        <td>123456</td>
                        <td>hnhun@gmail.com</td>
                        <td>0935126931</td>
                        <td>Khách Hàng</td>
                        <td>
                            <button class="action-btn edit-btn"><i class='bx bx-edit'></i></button>
                            <button class="action-btn delete-btn"><i class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Hoàng Thị Diệu Linh</td>
                        <td>Diệu Linh</td>
                        <td>123</td>
                        <td>dlinh@gmail.com</td>
                        <td>0935126931</td>
                        <td>Quản Trị</td>
                        <td>
                            <button class="action-btn edit-btn"><i class='bx bx-edit'></i></button>
                            <button class="action-btn delete-btn"><i class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection