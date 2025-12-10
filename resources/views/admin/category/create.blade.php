@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="mb-4 fw-bold">Add Category</h1>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Category name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Category description"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="is_active" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button class="btn btn-success">Add Category</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection
