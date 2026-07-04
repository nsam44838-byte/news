<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle" type="button" aria-label="Toggle sidebar">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="content-wrapper">
    @include('admin.layouts.sidebar')

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between">
                <span><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
            </div>
        @endif
        {{ $slot ?? '' }}
        @yield('content')
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.add('show');
        overlay.classList.add('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('active');
    }

    if (toggle) {
        toggle.addEventListener('click', openSidebar);
    }

    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
