@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Categories</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">+ Add Category</a>
    </div>

    <!-- Table -->
    <table class="table table-dark table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Active</th>
                <th width="180px">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>{{ $cat->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.category.delete', $cat->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
