@extends('layouts.app')

@section('content')
   
        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Products</h6>
                    <h2 class="mt-2">{{ $product->name }}</h2>
                </div>
                
                <div class="container wow fadeInUp h-100 d-inline-block" data-wow-delay="0.1s" >
                    <img src="{{ asset('images/'.$product->image) }}"  alt="" class="rounded float-end w-25 ">
                    <span>
                        {{ $product->specs }}
                    </span>

                </div>
               

                </div>
            </div>
        </div>
        <!-- Portfolio End -->

@endsection