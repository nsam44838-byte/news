<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
      /* Carousel Height */
      #homeCarousel .carousel-item {
          height: 70vh;
          min-height: 400px;
          background: #000;
          overflow: hidden;
          position: relative;
      }

      /* Image Styling */
      #homeCarousel .carousel-item img {
          object-fit: cover;
          width: 100%;
          height: 100%;
          transition: transform 0.5s ease-in-out;
      }

      /* Smooth slide transition */
      #homeCarousel .carousel-inner {
          transition: transform 1s ease-in-out;
      }

      /* Caption Styling */
      #homeCarousel .carousel-caption {
          bottom: 20%;
          text-align: left;
          background: rgba(0,0,0,0.5);
          padding: 20px;
          border-radius: 8px;
      }

      #homeCarousel .carousel-caption h5 {
          font-size: 2.5rem;
          font-weight: 700;
          animation: fadeInDown 1s ease-out;
      }

      #homeCarousel .carousel-caption p {
          font-size: 1.2rem;
          animation: fadeInDown 1.5s ease-out;
      }

      /* Animate captions from above */
      @keyframes fadeInDown {
          from { opacity: 0; transform: translateY(-50px); }
          to { opacity: 1; transform: translateY(0); }
      }
  </style>
</head>
<body>



 @include('layouts.navbar')

<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">MyWebsite</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ route('posts.index') }}">News</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<!-- Slides Section -->
<div class="container mt-4">
  @if(isset($slides) && $slides->count() > 0)
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner rounded">
        @foreach($slides as $key => $slide)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if($slide->image)
              <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
            @endif
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $slide->title }}</h5>
              <p>{{ $slide->description }}</p>
            </div>
          </div>
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  @else
    <p class="text-center mt-3">No slides available.</p>
  @endif
</div>




<!-- @forelse($posts as $post)
<div class="col-md-4 mb-3">
  <div class="card h-100">

    @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
    @endif

    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">{{ Str::limit($post->content, 80) }}</p>
      <a href="{{ url('post/' . $post->id) }}" class="btn btn-primary btn-sm">Read More</a>
    </div>
  </div>
</div>
@empty
<p class="text-center">No news available.</p>
@endforelse -->








 
@include('posts') 
@include('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
