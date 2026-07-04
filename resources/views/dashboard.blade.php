<x-app-layout>
    <div class="container py-5">
        <div class="text-center">
            <h2 class="fw-bold mb-3">Welcome, {{ Auth::user()->name }}!</h2>
            <p class="text-secondary mb-4" style="color:#94a3b8 !important;">You're logged in successfully.</p>
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-primary">
                <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
            </a>
        </div>
    </div>
</x-app-layout>
