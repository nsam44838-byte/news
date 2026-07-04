@extends('front.layouts.app')

@section('title', $post->title)

@section('content')
<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height:450px;object-fit:cover;" alt="{{ $post->title }}">
                @endif
                <div class="card-body p-4">
                    <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
                    <p class="text-muted mb-4">
                        <i class="bi bi-calendar3 me-1"></i>{{ $post->created_at->format('F d, Y') }}
                        @if($post->category)
                        <span class="ms-3"><i class="bi bi-folder me-1"></i>{{ $post->category->name }}</span>
                        @endif
                    </p>
                    <div class="fs-5 lh-lg">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-dark mt-4">
                <i class="bi bi-arrow-left me-1"></i>Back
            </a>
        </div>
    </div>
</section>
@endsection
