@extends('layouts.admin')
@section('content')
<div class="content-wrapper" style="background-color: white">
  <div class="form-container" style="max-width: 500px; margin: 0 auto;">
    <h2 class="text-center mb-7">Thêm phim</h2>
    <form>
      <div class="mb-2">
        <label for="movieName" class="form-label">Tên phim</label>
        <input type="text" class="form-control" id="movieName" placeholder="Nhập tên phim">
      </div>
      <div class="mb-2">
        <label for="trailer" class="form-label">Trailer</label>
        <input type="url" class="form-control" id="trailer" placeholder="Nhập đường dẫn trailer">
      </div>
      <div class="mb-2">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" rows="3" placeholder="Nhập mô tả"></textarea>
      </div>
      <div class="mb-2">
        <label for="releaseDate" class="form-label">Ngày khởi chiếu</label>
        <input type="date" class="form-control" id="releaseDate">
      </div>
      <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" id="isShowing">
        <label class="form-check-label" for="isShowing">Đang chiếu</label>
      </div>
      <div class="form-check form-switch mb-2">
        <input class="form-check-input" type="checkbox" id="isComingSoon">
        <label class="form-check-label" for="isComingSoon">Sắp chiếu</label>
      </div>
      <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary">Trở lại</button>
        <button type="submit" class="btn btn-custom btn-success">Thêm</button>
      </div>
    </form>
  </div>
</div>
@endsection
