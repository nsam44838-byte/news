@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">Dashboard</h1>
        <p class="text-secondary mb-0" style="color:#94a3b8 !important;">Welcome back, {{ Auth::user()->name }}</p>
    </div>
</div>

{{-- Stats Row --}}
<div class="row g-4 mb-4 row-cols-2 row-cols-md-3 row-cols-xl-5">
    <div class="col">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(56,189,248,0.15);color:#38bdf8;">
                <i class="bi bi-images"></i>
            </div>
            <div class="stat-number">{{ $stats['slides'] }}</div>
            <div class="stat-label">Slides</div>
        </div>
    </div>
    <div class="col">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(168,85,247,0.15);color:#a855f7;">
                <i class="bi bi-folder"></i>
            </div>
            <div class="stat-number">{{ $stats['categories'] }}</div>
            <div class="stat-label">Categories</div>
        </div>
    </div>
    <div class="col">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(34,197,94,0.15);color:#22c55e;">
                <i class="bi bi-file-text"></i>
            </div>
            <div class="stat-number">{{ $stats['posts'] }}</div>
            <div class="stat-label">Posts</div>
        </div>
    </div>
    <div class="col">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(251,146,60,0.15);color:#fb923c;">
                <i class="bi bi-megaphone"></i>
            </div>
            <div class="stat-number">{{ $stats['news'] }}</div>
            <div class="stat-label">News</div>
        </div>
    </div>
    <div class="col">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(244,63,94,0.15);color:#f43f5e;">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-number">{{ $stats['users'] }}</div>
            <div class="stat-label">Users</div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="section-card">
            <h5><i class="bi bi-lightning-charge me-2" style="color:#38bdf8;"></i>Quick Actions</h5>
            <div class="d-flex flex-wrap gap-2 mt-3">
                <a href="{{ route('admin.slide.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Add Slide
                </a>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Add Category
                </a>
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Add Post
                </a>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Add News
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Recent Items --}}
<div class="row g-4">
    <div class="col-md-6">
        <div class="section-card">
            <h5><i class="bi bi-file-text me-2" style="color:#22c55e;"></i>Recent Posts</h5>
            @forelse($recentPosts as $post)
            <div class="list-item">
                <div>
                    <div class="title">{{ Str::limit($post->title, 40) }}</div>
                    <div class="meta">{{ $post->created_at->diffForHumans() }}</div>
                </div>
                <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-outline-light" style="font-size:0.8rem;padding:2px 10px;">
                    Edit
                </a>
            </div>
            @empty
            <p class="text-secondary mb-0" style="color:#64748b !important;font-size:0.9rem;">No posts yet.</p>
            @endforelse
            @if($stats['posts'] > 0)
            <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-outline-light mt-3" style="font-size:0.85rem;">
                View All <i class="bi bi-arrow-right ms-1"></i>
            </a>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="section-card">
            <h5><i class="bi bi-images me-2" style="color:#38bdf8;"></i>Recent Slides</h5>
            @forelse($recentSlides as $slide)
            <div class="list-item">
                <div>
                    <div class="title">{{ Str::limit($slide->title, 40) }}</div>
                    <div class="meta">{{ $slide->created_at->diffForHumans() }}</div>
                </div>
                <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-sm btn-outline-light" style="font-size:0.8rem;padding:2px 10px;">
                    Edit
                </a>
            </div>
            @empty
            <p class="text-secondary mb-0" style="color:#64748b !important;font-size:0.9rem;">No slides yet.</p>
            @endforelse
            @if($stats['slides'] > 0)
            <a href="{{ route('admin.slide.index') }}" class="btn btn-sm btn-outline-light mt-3" style="font-size:0.85rem;">
                View All <i class="bi bi-arrow-right ms-1"></i>
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
