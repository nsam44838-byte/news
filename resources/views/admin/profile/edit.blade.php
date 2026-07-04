@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Profile</h1>

    <div class="row g-4">
        <div class="col-lg-6">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="col-lg-6">
            @include('profile.partials.update-password-form')
        </div>
        <div class="col-lg-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
