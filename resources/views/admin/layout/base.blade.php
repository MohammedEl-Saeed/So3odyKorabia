
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- ====================================== start css vito files ========================== -->
        <link href="{{asset('assets/plugins/vito/en/css/bootstrap.min.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/typography.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/style.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/responsive.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/custom-lang.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <!-- ====================================== end css vito files ============================ -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    </head>
    <body>
        <div class="wrapper">
            @include('admin.include.header')
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.include.footer')
        <!-- ===============================  start vito js files =============================== -->
    <script src="{{asset('assets/plugins/vito/en/js/jquery.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/jquery-3.3.1.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/popper.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/bootstrap.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/jquery.appear.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/countdown.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/waypoints.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/jquery.counterup.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/wow.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/apexcharts.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/slick.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/select2.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/owl.carousel.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/jquery.magnific-popup.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/smooth-scrollbar.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/lottie.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/bodymovin.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/core.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/charts.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/animated.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/highcharts.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/highcharts-3d.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/highcharts-more.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/kelly.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/maps.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/morris.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/morris.min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/raphael-min.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/worldLow.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/chart-custom.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/vito/en/js/custom.js?v=7.0.3')}}"></script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    @yield('script')
    <!-- ===============================  end vito js files ================================= -->
    </body>
</html>
