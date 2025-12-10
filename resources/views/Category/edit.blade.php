@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Edit Category</h1>

    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf

        <input type="text" name="name" class="form-control mb-3"
               value="{{ $category->name }}" required>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
