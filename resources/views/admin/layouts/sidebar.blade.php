<div class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-shield-lock me-2"></i>Admin Panel
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard.index') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.slide.index') }}"
               class="nav-link {{ request()->routeIs('admin.slide.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>Slides
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}"
               class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                <i class="bi bi-folder"></i>Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}"
               class="nav-link {{ request()->routeIs('admin.post.*') ? 'active' : '' }}">
                <i class="bi bi-file-text"></i>Posts
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.news.index') }}"
               class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i>News
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.about.index') }}"
               class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="bi bi-info-circle"></i>About
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}"
               class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i>Contact
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name ?? 'Admin' }}
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger w-100">
                <i class="bi bi-box-arrow-right me-1"></i>Log Out
            </button>
        </form>
    </div>
</div>
