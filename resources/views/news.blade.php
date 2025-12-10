@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Featured News</h1>
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/400x200" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                        <span class="text-muted">{{ $item->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
