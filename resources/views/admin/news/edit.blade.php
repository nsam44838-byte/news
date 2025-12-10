@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Edit News</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $news->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($news->image)
                <img src="{{ asset('storage/'.$news->image) }}" width="150">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success">Update News</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
