@extends('../layouts.app')
 
@section('content')

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Hardware</h6>
                    <h2 class="mt-2">Recently Added Hardware</h2>
                </div>
                {{-- <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 pe-4 active" data-filter="first">All</li>
                            <li class="btn px-3 pe-4" data-filter=".first">Design</li>
                            <li class="btn px-3 pe-4" data-filter=".second">Development</li>
                        </ul>
                    </div>
                </div> --}}
                <div class="row g-4 portfolio-container">

         @foreach ($products as $product)

                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src=" {{ asset('images/'.$product->image)  }} " alt="">
                            


                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    {{-- <small class="text-white"><i class="fa fa-folder me-2"></i>{{ $product->parent_id }}</small> --}}
                                    <a class="h5 d-block text-white mt-1 mb-0" href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a>
                                    <span class="h5 d-block text-warning mt-1 mb-0">{{ $product->price }} $</span>
                                    <span class="h5 d-block text-info mt-1 mb-0">{{ $product->balance }} Available  <i class="fa fa-store text-success me-5 mt-1"></i></span>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="#">Add to basket <i class="bi bi-cart-plus"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
         @endforeach 
                </div>
            </div>
        </div>
        <!-- Portfolio End -->
      
@endsection