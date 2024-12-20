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
        <div class='add'>
            <a href="{{ route('admin.addUser') }}">Thêm người dùng</a>
        </div>
        <br>
        <div>
            <div class="search-container">
                <form action="{{ route('admin.users') }}" method="GET">
                    <input type="text" class="search-input" name="search" placeholder="Nhập thông tin người dùng"
                        value="{{ request('search') }}">
                    <button type="submit" class="search-button">
                        <img src="https://img.icons8.com/ios-filled/24/FFFFFF/search--v1.png" alt="Search Icon">
                    </button>
                </form>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Tài khoản</th>
                            {{-- <th>Mật khẩu</th> --}}
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Loại người dùng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="7" style="text-align: center;">Không tìm thấy người dùng phù hợp.</td>
                            </tr>
                        @else
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a class="action-btn edit-btn"><a href="{{ route('admin.editUser', $user->id) }}"><i
                                                    class='bx bx-edit'></i></a></a>

                                        <!-- Form xóa người dùng -->
                                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn"><i
                                                    class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
