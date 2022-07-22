<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>
<div class="container-xxl bg-white p-0">
  @include('layouts.partials.nav')

  @include('layouts.partials.header')

  @yield('content')

@include('layouts.partials.footer')

  @include('layouts.partials.footer-scripts')
</div>
 </body>

</html>

