@extends('front.layouts.app')

@section('title', 'Categories')

@section('content')
<section class="container py-5">
    <h1 class="fw-bold mb-4">
        <i class="bi bi-folder me-2"></i>Categories
    </h1>

    <div class="row g-4">
        @forelse($categories as $category)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-folder2-open" style="font-size:3rem;"></i>
                    <h5 class="mt-3">{{ $category->name }}</h5>
                    <p class="text-secondary">{{ $category->description }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-secondary">No categories available.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
