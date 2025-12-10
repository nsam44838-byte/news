@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="mb-4 fw-bold">Edit Post</h1>

    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $post->title) }}" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="6">{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- Excerpt -->
        <div class="mb-3">
            <label class="form-label">Excerpt</label>
            <input type="text" name="excerpt" class="form-control" 
                   value="{{ old('excerpt', $post->excerpt) }}">
        </div>

        <!-- Published -->
        <div class="mb-3">
            <label class="form-label">Published</label>
            <select name="is_published" class="form-control" required>
                <option value="1" {{ old('is_published', $post->is_published) ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !old('is_published', $post->is_published) ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <!-- Image Edit Section -->
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" 
                     width="150" class="mb-2 rounded border">
            @else
                <p class="text-muted">No image uploaded.</p>
            @endif

            <label class="form-label mt-2">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Update Post</button>
        <a href="{{ route('admin.post.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
