@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Add Slide</h1>

    <form action="{{ route('admin.slide.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Add Slide</button>
        <a href="{{ route('admin.slide.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
