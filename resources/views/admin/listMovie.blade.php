@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="background-color: white">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Quản lý phim <i class="mdi mdi-phone-minus:"></i> </h1>
        </div>
        </div>
    </div>
</div>

<div class='add' >
    <a href="{{ route('admin.addMovie') }}" >Thêm Phim</a>
    </div>
    <br>
    <div>
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Nhập thông tin phim">
        <button class="search-button">
            <img src="https://img.icons8.com/ios-filled/24/FFFFFF/search--v1.png" alt="Search Icon">
        </button>
    </div>
    <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Mã phim</th>
              <th>Hình ảnh</th>
              <th>Tên phim</th>
              <th>Mô tả</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dòng dữ liệu mẫu -->
            <tr>
              <td>8001</td>
              <td>
                <img src="https://via.placeholder.com/50" alt="The King's Man" />
              </td>
              <td>The King's Man 2019</td>
              <td>As a collection of history's worst tyrants and criminals...</td>
              <td>
                <button class="action-btn edit-btn"><i class='bx bx-edit'></i></button>
                <button class="action-btn delete-btn"><i class='bx bx-trash'></i></button>
                <button class="action-btn schedule-btn"><i class='bx bx-calendar'></i></button>
              </td>
            </tr>
            <tr>
              <td>8002</td>
              <td>
                <img
                  src="https://via.placeholder.com/50"
                  alt="Everybody's Talking About Jamie"
                />
              </td>
              <td>Everybody's Talking About Jamie</td>
              <td>Inspired by true events, New Regency's and Film4's...</td>
              <td>
                <button class="action-btn edit-btn"><a href="{{ route('admin.editMovie') }}"><i class='bx bx-edit'></i></a></button>
                <button class="action-btn delete-btn"><a href=""><i class='bx bx-trash'></i></a></button>
                <button class="action-btn schedule-btn"><i class='bx bx-calendar'></i></button>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
</div>



@endsection