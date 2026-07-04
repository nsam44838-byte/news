@extends('front.layouts.app')

@section('title', 'Latest Updates')

@section('content')
<section class="container py-5">
    <h1 class="fw-bold mb-4">
        <i class="bi bi-megaphone me-2"></i>Latest Updates
    </h1>

    <div class="row g-4">
        @forelse($news as $item)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $item->title }}">
                @else
                <div class="bg-secondary d-flex align-items-center justify-content-center" style="height:200px;">
                    <i class="bi bi-image text-white" style="font-size:3rem;"></i>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-secondary flex-grow-1">{{ Str::limit($item->content, 100) }}</p>
                    <small class="text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-secondary">No updates available yet.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
