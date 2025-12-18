<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }}</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .post-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0 p-3">

        {{-- Image --}}
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}"
             class="post-image mb-4"
             alt="Post Image">
        @endif

        <div class="card-body">

            {{-- Title --}}
            <h1 class="fw-bold">{{ $post->title }}</h1>

            {{-- Date --}}
            <p class="text-muted mb-3">
                📅 Posted on {{ $post->created_at->format('M d, Y') ?? 'No date' }}
            </p>

            {{-- Content --}}
            <div class="fs-5" style="line-height: 1.7;">
                {!! nl2br(e($post->content)) !!}
            </div>

        </div>
    </div>

    <a href="{{ url('/') }}" class="btn btn-dark mt-4">
        ← Back to News
    </a>

</div>

</body>
</html>
