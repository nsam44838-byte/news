    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body>
    <div class="d-flex">

            <div class="content">
                @yield('content')
            </div>



        <!-- SIDEBAR -->
        <div class="sidebar d-flex flex-column p-3">
            <h4 class="fw-bold mb-4">Admin Panel</h4>
            <ul class="nav nav-pills flex-column mb-auto">
                
                <li><a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">🏠 Dashboard</a></li>
                <li><a href="{{ route('admin.slide.index') }}" class="nav-link {{ request()->routeIs('admin.slide.index') ? 'active' : '' }}">🖼 Slides</a></li>
                <li><a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">📁 Categories</a></li>
                <li><a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->routeIs('admin.post.index') ? 'active' : '' }}">📰 Post</a></li>
                <!-- <li><a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">📰 News</a></li> -->
                <li><a href="{{ route('admin.about.index') }}" class="nav-link {{ request()->routeIs('admin.about.index') ? 'active' : '' }}">ℹ️ About</a></li>
                <li><a href="{{ route('admin.contact.index') }}" class="nav-link {{ request()->routeIs('admin.contact.index') ? 'active' : '' }}">📞 Contact</a></li>
                
            </ul>


            <div class="mt-auto pt-3">
                <div class="text-light mb-2">{{ Auth::user()->name ?? 'Admin' }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100">Log Out</button>
                </form>
            </div>
        </div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
