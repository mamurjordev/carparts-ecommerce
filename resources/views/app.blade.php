<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="UTF-8" lang="de">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendor/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendor/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/style.header-spaceship-variant-one.css') }}"
        media="(min-width: 1200px)">
    <link rel="stylesheet" href="{{ asset('app/css/style.mobile-header-variant-one.css') }}"
        media="(max-width: 1199px)">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('app/vendor/fontawesome/css/all.min.css') }}">

    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">


</head>

<body dir="ltr">
    <!-- site -->
    <div class="site">
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertia
    </div>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>

    <!-- scripts -->
    <script src="{{ asset('app/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('app/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('app/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('app/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('app/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('app/js/number.js') }}"></script>
    <script src="{{ asset('app/js/main.js') }}"></script>
</body>

</html>
