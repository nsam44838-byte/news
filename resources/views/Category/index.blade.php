@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <h1 class="mb-4 fw-bold">Categories</h1>

    <!-- Add Category Form -->
    <form action="{{ route('admin.category.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="d-flex gap-2">
            <input type="text" name="name" class="form-control" placeholder="Category name" required>
            <button class="btn btn-primary">Add</button>
        </div>
    </form>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Table -->
    <table class="table table-dark table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th width="180px">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.category.delete', $cat->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
