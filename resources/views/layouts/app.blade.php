    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar d-flex flex-column p-3">
            <h4 class="fw-bold mb-4">Admin Panel</h4>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                        🏠 Dashboard
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('admin.slide.index') }}" class="nav-link {{ request()->routeIs('admin.slide.index') ? 'active' : '' }}">
                        🖼 Slides
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                        📁 Categories
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->routeIs('admin.post.index') ? 'active' : '' }}">
                        📰 posts
                    </a>
                </li>

                <!-- <li class="nav-item mb-1">
                    <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">
                        📰 News
                    </a>
                </li> -->
                <li class="nav-item mb-1">
                    <a href="{{ route('admin.about.index') }}" class="nav-link {{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
                        ℹ️ About
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('admin.contact.index') }}" class="nav-link {{ request()->routeIs('admin.contact.index') ? 'active' : '' }}">
                        📞 Contact
                    </a>
                </li>


            </ul>

            @if(Auth::check())
            <div class="text-light mb-2">{{ Auth::user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger w-100">Log Out</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary w-100">Login</a>
        @endif

        </div>

        <!-- PAGE CONTENT -->
        <div class="content flex-1 position-relative">
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
