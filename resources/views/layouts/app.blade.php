<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>
<div class="container-xxl bg-white p-0">
  @include('layouts.partials.header')
  @include('layouts.partials.nav')
 @yield('content')

@include('layouts.partials.footer')
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
</div>  
@include('layouts.partials.footer-scripts')
 

 </body>

</html>

