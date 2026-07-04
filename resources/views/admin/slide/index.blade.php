@extends('layouts.admin')

@section('title', 'Slides')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Slides</h1>
        <a href="{{ route('admin.slide.create') }}" class="btn btn-primary">+ Add Slide</a>
    </div>

    <!-- Slides Table -->
    <table class="table table-dark table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->description }}</td>
                    
                    <td>
                        @if($slide->image)
                            <img src="{{ asset('storage/'.$slide->image) }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.slide.delete', $slide->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No slides found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
