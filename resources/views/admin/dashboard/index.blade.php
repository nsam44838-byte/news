
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










