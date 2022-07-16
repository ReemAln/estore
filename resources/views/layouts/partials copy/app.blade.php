<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>


@include('layouts.partials.nav')

@include('layouts.partials.header')
<h1 class="alert alert-danger">hiiiiiiiiiiiii</h1>
@yield('content')

@include('layouts.partials.footer')

@include('layouts.partials.footer-scripts')

 </body>

</html>

