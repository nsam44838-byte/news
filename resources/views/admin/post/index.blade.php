@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Posts</h1>
        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">+ Add Post</a>
    </div>

    <!-- Posts Table -->
    <table class="table table-dark table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Views</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name ?? 'N/A' }}</td>
                    <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
                    <td>{{ $post->views_count }}</td>
                    <!-- <td>{{ $post->image }}</td> -->
                    <td>
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" width="100">
                        @endif
                    </td>
                    <td>
                        
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" class="d-inline">
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
