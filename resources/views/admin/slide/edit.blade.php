@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Edit Slide</h1>

    <form action="{{ route('admin.slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slide->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $slide->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($slide->image)
                <img src="{{ asset('storage/'.$slide->image) }}" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Update Slide</button>
        <a href="{{ route('admin.slide.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
