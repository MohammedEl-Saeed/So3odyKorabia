
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>The Farm | @yield('title')</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- ====================================== start css vito files ========================== -->
        <link href="{{asset('assets/plugins/vito/en/css/bootstrap.min.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/typography.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/style.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/responsive.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatable/css/buttons.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/custom-lang.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <!-- ====================================== end css vito files ============================ -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    </head>
    <body>
        <div class="wrapper">
            @include('admin.include.header')
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    <div class="m-3">
                        @include('admin.include.messages_errors')
                    </div>
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
        <!-- ===============================  start datatable js files =============================== -->
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('service-worker.js')}}"></script>
        <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
        <!-- ===============================  end datatable js files =============================== -->
        <script>
            $(document).ready(function() {
                $('.datatable-example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'copy',
                        title: 'Insurance Companies',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Export to Excel',
                        title: 'Insurance Companies',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o"></i> CSV',
                        titleAttr: 'CSV',
                        title: 'Insurance Companies',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF',
                        title: 'Insurance Companies',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        },
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                        columns: ':visible'
                        },
                        customize: function(win) {
                            $(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
                        }
                    },
                    ]
                } );

                $('.iq-menu-bt-sidebar').on('click' , function(){
                    if($('.logo-text').hasClass('delete-logo-text')){
                        $('.logo-text').removeClass('delete-logo-text');
                    }else{
                        $('.logo-text').addClass('delete-logo-text');
                    }
                });

                $('.iq-sidebar').on('mouseleave' , function(){
                    if($('.logo-text').hasClass('delete-logo-text')){
                        $('.logo-text').fadeOut(300);
                    }
                });

                $('.iq-sidebar').on('mouseenter' , function(){
                    if($('.logo-text').hasClass('delete-logo-text')){
                        $('.logo-text').fadeIn(300);
                    }
                });
            } );
{{--        </script>--}}
{{--        <script>--}}
            const beamsClient = new PusherPushNotifications.Client({
                instanceId: '72becb2c-5c2a-4830-96d0-60da5a3172ab',
            });

            beamsClient.start()
                .then(() => beamsClient.addDeviceInterest('hello'))
                .then(() => console.log('Successfully registered and subscribed!'))
                .catch(console.error);
        </script>
        @yield('script')
        <!-- ===============================  end vito js files ================================= -->
    </body>
</html>
