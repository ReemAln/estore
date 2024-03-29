

<!-- Navbar & Hero Start -->

<div class="container-xxl position-relative p-0">

    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-laptop me-2"></i>Top<span class="fs-5">Tech</span></h1>  
            
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Service</a>
                <a href="{{ route('products.index') }}" class="nav-item nav-link">Products</a>
               
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            <a href="{{ route('logout') }}" class="dropdown-item">logout</a>
                            
                        </div>
                    </div>
                @else
                  <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>
                   @if (Route::has('register'))
                       <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                   @endif
               @endauth


            </div>

            
        </div>
    </nav>

    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">All in one SEO tool need to grow your business rapidly</h1>
                    <p class="text-white pb-3 animated zoomIn">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit justo amet ipsum vero ipsum clita lorem</p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Free Quote</a>


                    @auth
                     <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Logged in </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth

                    



                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="img/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Navbar & Hero End -->



