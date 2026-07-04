<footer class="bg-dark text-light pt-5 pb-3 mt-auto">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-newspaper me-2"></i>NewsPortal</h5>
                <p class="text-secondary">Your trusted source for the latest news, articles, and updates from around the world.</p>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/') }}" class="text-secondary text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('posts.index') }}" class="text-secondary text-decoration-none">News</a></li>
                    <li class="mb-2"><a href="{{ route('news') }}" class="text-secondary text-decoration-none">Latest</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <h6 class="fw-bold mb-3">Categories</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Technology</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Business</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Sports</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4">
                <h6 class="fw-bold mb-3">Contact</h6>
                <ul class="list-unstyled text-secondary">
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>info@newsportal.com</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>+1 234 567 890</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary my-3">
        <p class="text-center text-secondary m-0">&copy; {{ date('Y') }} NewsPortal. All rights reserved.</p>
    </div>
</footer>
