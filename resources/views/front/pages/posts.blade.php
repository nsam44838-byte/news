@extends('front.layouts.app')

@section('title', 'All News')

@section('content')
<section class="container py-5">
    <h1 class="fw-bold mb-4">
        <i class="bi bi-list-ul me-2"></i>Latest News
    </h1>

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

    @if(method_exists($posts, 'links'))
    <div class="mt-4 d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
    @endif
</section>
@endsection
