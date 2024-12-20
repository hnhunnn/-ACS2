@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="background-color: white">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Quản lý phim</h1>
        </div>
        </div>
    </div>
</div>

<div class='add'>
    <a href="{{ route('admin.addMovie') }}">Thêm Phim</a>
</div>
<br>

<div>
  <div class="search-container">
    <form action="{{ route('admin.listMovies') }}" method="GET">
      <input type="text" class="search-input" name="search" placeholder="Nhập thông tin phim" value="{{ request('search') }}">
      <button type="submit" class="search-button">
          <img src="https://img.icons8.com/ios-filled/24/FFFFFF/search--v1.png" alt="Search Icon">
      </button>
  </form>  
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
            @if ($movies->isEmpty())
            <tr>
                <td colspan="5" style="text-align: center;">Không tìm thấy phim phù hợp</td>
            </tr>
            @else
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>
                    <img src="{{ asset($movie->image_path) }}" alt="{{ $movie->movieName }}" width="50" height="50">
                </td>
                <td>{{ $movie->movieName }}</td>
                <td>{{ Str::limit($movie->description, 50) }}</td>
                <td>
                    <button class="action-btn edit-btn">
                        <a href="{{ route('admin.editMovie', $movie->id) }}">
                            <i class='bx bx-edit'></i>
                        </a>
                    </button>
                    <button class="action-btn delete-btn">
                        <a href="{{ route('admin.deleteMovie', $movie->id) }}">
                            <i class='bx bx-trash' style="color: red"></i>
                        </a>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>        
        </table>
    </div>
</div>

@endsection
