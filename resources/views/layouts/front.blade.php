<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('front/images/favicon.ico') }}"/>

    <!-- CSS
    ================================================== -->
    <!-- Bootstrap css file-->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Default Theme css file -->
    <link id="switcher" href="{{ asset('front/css/themes/green-theme.css') }}" rel="stylesheet">
    <!-- Slick slider css file -->
    <link href="{{ asset('front/css/slick.css') }}" rel="stylesheet">
    <!-- Photo Swipe Image Gallery -->
    <link rel='stylesheet prefetch' href='{{ asset('front/css/photoswipe.css') }}'>
    <link rel='stylesheet prefetch' href='{{ asset('front/css/default-skin.css') }}'>

    <!-- Main structure css file -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:900' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-arrow-circle-o-up"></i></a>
@include('components.front.header')
@yield('content')
@include('components.front.footer')
</body>
<!-- jQuery Library  -->
<script src="{{ asset('front/js/jquery.js') }}"></script>
<!-- Bootstrap default js -->
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/modernizr.custom.79639.js') }}"></script>
<!-- counter -->
<script src="{{ asset('front/js/waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
<!-- Doctors hover effect -->
<script src="{{ asset('front/js/snap.svg-min.js') }}"></script>
<script src="{{ asset('front/js/hovers.js') }}"></script>
<!-- Photo Swipe Gallery Slider -->
<script src='{{ asset('front/js/photoswipe.min.js') }}'></script>
<script src='{{ asset('front/js/photoswipe-ui-default.min.js') }}'></script>
<script src="{{ asset('front/js/photoswipe-gallery.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('front/js/custom.js') }}"></script>
</html>