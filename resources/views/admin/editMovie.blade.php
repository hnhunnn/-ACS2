@extends('layouts.admin')
@section('content')
<div class="content-wrapper" style="background-color: white">
  <div class="form-container" style="max-width: 500px; margin: 20px auto;">
    <h2 class="text-center mb-4">Chỉnh sửa phim</h2>
    <form method="POST" action="{{ route('admin.updateMovie') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="movie_id" value="{{ $movie->id }}">
    
      <!-- Tên phim -->
      <div class="mb-3">
        <label for="movieName" class="form-label">Tên phim <span class="text-danger">*</span></label>
        <input 
          type="text" 
          class="form-control" 
          id="movieName" 
          name="movie_name" 
          value="{{ old('movie_name', $movie->movieName) }}" 
          placeholder="Nhập tên phim" 
          required>
      </div>
      
      <!-- Trailer -->
      <div class="mb-3">
        <label for="trailer" class="form-label">Trailer</label>
        <input 
          type="url" 
          class="form-control" 
          id="trailer" 
          name="trailer" 
          value="{{ old('trailer', $movie->trailer_url) }}" 
          placeholder="Nhập đường dẫn trailer">
      </div>
      
      <!-- Mô tả -->
      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea 
          class="form-control" 
          id="description" 
          name="description" 
          rows="4" 
          placeholder="Nhập mô tả">{{ old('description', $movie->description) }}</textarea>
      </div>
      
      <!-- Ngày khởi chiếu -->
      <div class="mb-3">
        <label for="releaseDate" class="form-label">Ngày khởi chiếu</label>
        <input 
          type="date" 
          class="form-control" 
          id="releaseDate" 
          name="release_date" 
          value="{{ old('release_date', $movie->release_date) }}">
      </div>
      
      <!-- Hình ảnh phim -->
      <div class="mb-3">
        <label for="movieImage" class="form-label">Hình ảnh phim</label>
        <input 
          type="file" 
          class="form-control" 
          id="movieImage" 
          name="movie_image" 
          accept="image/*">
        @if ($movie->image_path)
          <div class="mt-2">
            <img src="{{ asset($movie->image_path) }}" alt="Movie Image" style="max-width: 100px;">
          </div>
        @endif
      </div>
      
      <!-- Trạng thái -->
      <div class="mb-3">
        <div class="form-check form-switch mb-3">
          <input 
            class="form-check-input" 
            type="checkbox" 
            id="isShowing" 
            name="is_showing" 
            {{ old('is_showing', $movie->showing) ? 'checked' : '' }}>
          <label class="form-check-label" for="isShowing">Đang chiếu</label>
        </div>
        <div class="form-check form-switch mb-3">
          <input 
            class="form-check-input" 
            type="checkbox" 
            id="isComingSoon" 
            name="is_coming_soon" 
            {{ old('is_coming_soon', !$movie->showing) ? 'checked' : '' }}>
          <label class="form-check-label" for="isComingSoon">Sắp chiếu</label>
        </div>        
      </div>
      
      <!-- Nút hành động -->
      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.listMovie') }}" class="btn btn-secondary">Trở lại</a>
        <button type="submit" class="btn btn-success">Lưu</button>
      </div>
    </form>
  </div>
</div>
@endsection
