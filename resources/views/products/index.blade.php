@extends('../layouts.app')
 
@section('content')

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                    <h2 class="mt-2">Our Products</h2>
                </div>
                <div class="row g-4">

                    
                    @foreach ($products as $product)

                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="{{ rand(0,10)/10 }}s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src=" {{ asset('images/thumbs/'.$product->image)  }} " alt="">                            
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{ asset('images/thumbs/'.$product->image)  }}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                   
                                    <a class="h5 d-block text-white mt-1 mb-0" href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a>
                                    <span class="h5 d-block text-warning mt-1 mb-0">{{ $product->price }} $</span>
                                    <span class="h5 d-block text-info mt-1 mb-0">{{ $product->balance }} Available  <i class="fa fa-store text-success me-5 mt-1"></i></span>
                                    
                                    <form action="{{ url('addcart',$product->id) }}" method="POST" >

                                      
                                          
                                        <div class="input-group mb-3">
                                           
                                            {{-- <label class="input-group-text " for="qty">Qty</label> --}}
                                            <input type="number" class="form-control-sm w-25" name="qty" id="qty" value="1" min="1" width="100px"/>  

                                          
                                          </div>

                                          <a class="  text-white " href="{{ route('products.show',$product->id) }}"> <span>Add to Cart </span>  </a> 

{{-- 
                                        <div class="form-group col-6">
                                            

                                            <input type="number" class="form-control" name="qty"/>

                                        </div>
                                        <a class="btn btn-info  col-6" href="#">Add to cart <i class="bi bi-cart-plus"></i></a> --}}
                                      
                                    </form>

                                    {{-- <form class="row g-3" action="{{ url('addcart',$product->id) }}" method="POST" >
                                        <div class="col-auto">
                                            <label for="qty">Quantity</label>
                                            <input type="number" class="form-control w-25" name="qty"/>                                   
                                        </div>                    
                                        <div class="col-auto">
                                          <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                                        </div>
                                      </form> --}}

                                </div>
                            </div>
                        </div>
                    </div>



                   @endforeach     
                </div>
            </div>
        </div>
        <!-- Service End -->



      
@endsection