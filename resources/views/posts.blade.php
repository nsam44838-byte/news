<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Carousel Height */
    #homeCarousel .carousel-item {
        height: 70vh;
        min-height: 400px;
        background: #000;
        overflow: hidden;
        position: relative;
    }

    /* Image Styling */
    #homeCarousel .carousel-item img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease-in-out;
    }

    /* Smooth slide transition */
    #homeCarousel .carousel-inner {
        transition: transform 1s ease-in-out;
    }

    /* Caption Styling */
    #homeCarousel .carousel-caption {
        bottom: 20%;
        text-align: left;
        background: rgba(0,0,0,0.5);
        padding: 20px;
        border-radius: 8px;
    }

    #homeCarousel .carousel-caption h5 {
        font-size: 2.5rem;
        font-weight: 700;
        animation: fadeInDown 1s ease-out;
    }

    #homeCarousel .carousel-caption p {
        font-size: 1.2rem;
        animation: fadeInDown 1.5s ease-out;
    }

    /* Animate captions from above */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-50px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>

    <!-- 3. The main content container using Bootstrap grid system -->
    <div class="container py-5">
        <h1 class="mb-4 text-center">LATEST NEWS</h1>
        <!-- The Bootstrap .row class manages the layout and responsiveness -->
        <div class="row">

            <!-- The provided PHP/Blade snippet goes here -->
            @forelse($posts as $post)
            <!-- col-md-4 makes it 3 columns on medium screens and up, full width on small screens -->
            <div class="col-md-4 mb-4">
              <div class="card h-100">

                @if($post->image)
                <!-- The style here uses the class definitions from the <style> block above -->
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <!-- Truncation handled by PHP logic -->
                  <p class="card-text">{{ Str::limit($post->content, 80) }}</p>
                  <a href="{{ url('post/' . $post->id) }}" class="btn btn-primary btn-sm">Read More</a>
                  
                </div>
              </div>
            </div>
            @empty
            <div class="col-12">
                <p class="empty-message">No news available.</p>
            </div>
            @endforelse
            <!-- End of PHP/Blade snippet -->

        </div>
    </div>

    <!-- Optional: Bootstrap JS bundle for interactive components (not strictly needed for this design) -->
    <script src="cdn.jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
