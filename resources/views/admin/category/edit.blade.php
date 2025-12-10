@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Edit Category</h1>

    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $category->name) }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <!-- Active -->
        <div class="mb-3">
            <label for="is_active" class="form-label">Active</label>
            <select name="is_active" id="is_active" class="form-control" required>
                <option value="1" {{ $category->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$category->is_active ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button class="btn btn-success">Update Category</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
