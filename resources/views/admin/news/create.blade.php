@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Add News</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Add News</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
