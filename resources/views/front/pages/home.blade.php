@extends('front.layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    .hero-carousel .carousel-item {
        height: 70vh;
        min-height: 400px;
        max-height: 600px;
        background: #000;
        overflow: hidden;
    }
    .hero-carousel .carousel-item img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .hero-carousel .carousel-caption {
        bottom: 15%;
        background: rgba(0,0,0,0.6);
        padding: 20px 25px;
        border-radius: 8px;
        text-align: left;
        max-width: 600px;
    }
    .hero-carousel .carousel-caption h5 {
        font-size: 2.5rem;
        font-weight: 700;
    }
    .hero-carousel .carousel-caption p {
        font-size: 1.1rem;
    }
    @media (max-width: 768px) {
        .hero-carousel .carousel-item {
            height: 45vh;
            min-height: 250px;
        }
        .hero-carousel .carousel-caption {
            bottom: 10%;
            padding: 12px 16px;
            max-width: 100%;
        }
        .hero-carousel .carousel-caption h5 {
            font-size: 1.3rem;
        }
        .hero-carousel .carousel-caption p {
            font-size: 0.85rem;
            margin-bottom: 0;
        }
    }
</style>
@endpush

@section('content')

@if(isset($slides) && $slides->count() > 0)
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
        @foreach($slides as $key => $slide)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if($slide->image)
            <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
            @endif
            <div class="carousel-caption">
                <h5>{{ $slide->title }}</h5>
                <p>{{ $slide->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@else
<div class="bg-dark text-white text-center py-5">
    <h2>Welcome to NewsPortal</h2>
    <p class="text-secondary">Stay informed with the latest news</p>
</div>
@endif

<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Latest News</h2>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-dark">View All</a>
    </div>
    <div class="row g-4">
        @forelse($posts as $post)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $post->title }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text text-secondary flex-grow-1">{{ Str::limit($post->content, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-secondary">No posts available yet.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection
