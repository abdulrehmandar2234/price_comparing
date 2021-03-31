<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title> Price Comparing Website</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('frontEnd.partials.styles')
    @yield('styles')
    

{{-- <script src="{{ asset('assets/js/quantity.js')}}"></script> --}}
</head>
<body>

    <!-- ========== HEADER ========== -->
    @include('frontEnd.partials.header')
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
@yield('content')
</main>
   <!-- ========== FOOTER ========== -->
   @include('frontEnd.partials.footer')
   <!-- ========== END FOOTER ========== -->

 <!-- Go to Top -->
 <a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->
<!-- ========== HEADER ========== -->
@include('frontEnd.partials.scripts')
@yield('scripts')

<!-- ========== END HEADER ========== -->
   
</body>
</html>