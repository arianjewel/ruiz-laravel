<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public/front-end/assets')}}/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/vendor/simple-line-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/animation.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/slick.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/animation.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/fancy-box.css">
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/plugins/jqueryui.min.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="{{asset('/public/front-end/assets')}}/js/vendor/vendor.min.js"></script>
    <script src="{{asset('/public/front-end/assets')}}/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/style.css">
    <!--<link rel="stylesheet" href="{{asset('/public/front-end/assets')}}/css/style.min.css">-->

</head>

<body>

<div class="main-wrapper">

    <!--  Header Start -->
    @include('front-end.includes.header')
    <!--  Header Start -->

    @yield('content')

    <!-- footer Start -->
   @include('front-end.includes.footer')
    <!-- footer End -->




    <!-- Modal -->

</div>

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{asset('/public/front-end/assets')}}/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="{{asset('/public/front-end/assets')}}/js/vendor/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('/public/front-end/assets')}}/js/vendor/popper.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/vendor/bootstrap.min.js"></script>

<!-- Plugins JS -->
<script src="{{asset('/public/front-end/assets')}}/js/plugins/slick.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/jquery.nice-select.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/countdown.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/image-zoom.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/fancybox.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/scrollup.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/jqueryui.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/ajax-contact.js"></script>

<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="{{asset('/public/front-end/assets')}}/js/vendor/vendor.min.js"></script>
<script src="{{asset('/public/front-end/assets')}}/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="{{asset('/public/front-end/assets')}}/js/main.js"></script>


</body>


</html>
