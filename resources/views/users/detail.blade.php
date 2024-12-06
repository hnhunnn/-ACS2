@extends('layouts.app')

@section('title', $movie->movieName)

@section('content')
    <div class="movie-detail-container">
        
        <div class="movie-image-container">
            <img src="{{ asset($movie->image_path) }}" alt="{{ $movie->movieName }}" class="movie-image">
        </div>

        <div class="movie-info">
            <h1 class="movie-title">{{ $movie->movieName }}</h1> 
            <p class="movie-description"><strong>Mô tả:</strong> {{ $movie->description }}</p>
               <!-- Trailer -->
            @if($movie->trailer_url)
            @php
                // Trích xuất VIDEO_ID từ trailer_url
                $parsedUrl = parse_url($movie->trailer_url);
                parse_str($parsedUrl['query'] ?? '', $queryParams);
                $videoId = $queryParams['v'] ?? '';
            @endphp

            @if($videoId)
                <div class="video-container">
                    <iframe width="560" height="315" 
                            src="https://www.youtube.com/embed/{{ $videoId }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            @else
                <p>Trailer không khả dụng.</p>
            @endif
            @else
                <p>Không có trailer.</p>
            @endif
        </div>
    </div>

@endsection
