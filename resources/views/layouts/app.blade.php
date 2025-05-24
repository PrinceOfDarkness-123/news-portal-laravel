<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel News Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('#newsCarousel');
        const indicators = document.querySelectorAll('.indicator-dot');

        carousel.addEventListener('slide.bs.carousel', function (e) {
            indicators.forEach(dot => dot.classList.remove('active'));
            if (indicators[e.to]) {
                indicators[e.to].classList.add('active');
            }
        });
    });
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="{{ route('news.index') }}">📰 Laravel News</a>
        </div>
    </nav>
    <!-- Banner Section -->
<div class="container-fluid mt-4 px-5">
    <div id="bannerCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow-sm" style="height: 150px;">
            <div class="carousel-item active">
                <img src="{{ asset('images/front end top banners/banner1.jpeg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/front end top banners/banner2.jpeg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/front end top banners/banner3.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Banner 3">
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
    <!-- Horizontal Navigation Bar -->
    <div class="bg-light border-top border-bottom py-2 mt-custom">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('news.index') ? 'active fw-bold text-primary' : 'text-dark' }}" href="{{ route('news.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Latest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Popular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Politics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Entertainment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid mt-4 px-5">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-3 mb-4">
               <h5 class="border-bottom pb-2 mb-3">📂 Trending News</h5>
             
               <div class="small-news">
                 <img src="https://placehold.co/100x80" alt="Thumb 1">
                 <div class="small-news-content">
                   <h6>Spring Fashion Show at the University of Michigan Has</h6>
                   <p class="text-muted mb-0">August 7, 2019</p>
                 </div>
               </div>

               <div class="small-news">
                 <img src="https://placehold.co/100x80" alt="Thumb 2">
                 <div class="small-news-content">
                   <h6>Study 2020: Fake Engagement is Only Half the Problem</h6>
                   <p class="text-muted mb-0">August 7, 2019</p>
                 </div>
               </div>

               <div class="small-news">
                 <img src="https://placehold.co/100x80" alt="Thumb 3">
                 <div class="small-news-content">
                   <h6>Laptop with 128-bit Processor, 32GB of RAM and 24MP Front Camera</h6>
                   <p class="text-muted mb-0">August 7, 2019</p>
                 </div>
               </div>

               <div class="small-news">
                 <img src="https://placehold.co/100x80" alt="Thumb 4">
                 <div class="small-news-content">
                   <h6>Flying Over the Grand Canyon with a Helicopter</h6>
                   <p class="text-muted mb-0">August 7, 2019</p>
                 </div>
               </div>
               <div class="mini-poll mt-4">
                   <h5 class="border-bottom pb-2 mb-3">📊 Mini Poll</h5>
                   <h6 class="mb-2">What is your favorite tech brand?</h6>
                   <form class="poll-form">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pollOption" id="apple" value="Apple">
                          <label class="form-check-label" for="apple">Apple</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pollOption" id="apple" value="Apple">
                          <label class="form-check-label" for="apple">Samsung</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pollOption" id="apple" value="Apple">
                          <label class="form-check-label" for="apple">Google</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pollOption" id="apple" value="Apple">
                          <label class="form-check-label" for="apple">Other</label>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-auto">Read more</a>
                   </form>
               </div>
            </aside>
            
            
            <!-- Main Content -->
            <main class="col-md-9">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3 mt-5">
        &copy; {{ date('Y') }} Laravel News Portal. All rights reserved.
    </footer>
</body>
</html>