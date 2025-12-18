{{--
@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Welcome to the Admin Dashboard 🎉</h1>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg">
                <div class="card-body text-center">
                    <h4>👩‍🎓 Students</h4>
                    <p class="fs-3 fw-bold">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg">
                <div class="card-body text-center">
                    <h4>👨‍🏫 Teachers</h4>
                    <p class="fs-3 fw-bold">25</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg">
                <div class="card-body text-center">
                    <h4>📚 Courses</h4>
                    <p class="fs-3 fw-bold">15</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg">
                <div class="card-body text-center">
                    <h4>💬 Messages</h4>
                    <p class="fs-3 fw-bold">8</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









 --}}




 @extends('layouts.admin')

@section('content')
<div class="container py-4">

    <h1 class="fw-bold mb-4">Admin Dashboard</h1>

    <div class="row g-4">

        <!-- Dashboard -->
        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h1 class="mb-2">🏠</h1>
                    <h5 class="mb-3">Dashboard</h5>

                    <a href="{{ route('admin.dashboard.index') }}"
                       class="btn btn-outline-light mt-auto">
                        Open
                    </a>
                </div>
            </div>
        </div>

        <!-- Slides -->
        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h1 class="mb-2">🖼</h1>
                    <h5 class="mb-3">Slides</h5>

                    <a href="{{ route('admin.slide.index') }}"
                       class="btn btn-outline-light mt-auto">
                        Manage
                    </a>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h1 class="mb-2">📁</h1>
                    <h5 class="mb-3">Categories</h5>

                    <a href="{{ route('admin.category.index') }}"
                       class="btn btn-outline-light mt-auto">
                        Manage
                    </a>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-md-3">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
                <div class="card-body text-center d-flex flex-column">
                    <h1 class="mb-2">📰</h1>
                    <h5 class="mb-3">Posts</h5>

                    <a href="{{ route('admin.post.index') }}"
                       class="btn btn-outline-light mt-auto">
                        Manage
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
