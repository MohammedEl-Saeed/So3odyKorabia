
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>The Farm | Show Order</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- ====================================== start css vito files ========================== -->
        <link href="{{asset('assets/plugins/vito/ar/css/bootstrap.min.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/ar/css/typography.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/ar/css/style.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/ar/css/responsive.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/vito/en/css/custom-lang.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatable-2/css/responsive.dataTables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable-2/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
        <script src="{{asset('assets/plugins/datatable-2/js/jquery-3.3.1.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable-2/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable-2/js/dataTables.responsive.min.js')}}"></script>

        <link href="{{asset('assets/plugins/vito/en/css/custom-lang.css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
        <!-- ====================================== end css vito files ============================ -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link href="{{asset('css/Aref_Lamsa.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .buttons-print svg{
                filter: invert(44%) sepia(97%) saturate(472%) hue-rotate(329deg) brightness(91%) contrast(79%);
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            @include('admin.include.header')
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    <div class="m-3">
                        @include('admin.include.messages_errors')
                    </div>
                    <div id="printableArea">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="iq-card ">
                                    <div class="card-body iq-card-body ">
                                        {{-- @if(!@empty($data['user']['image']))
                                        <img src="{{asset($data['user']['image'])}}" class="grid-view-img px-4 w-200">
                                        @endif --}}

                                        @if(!empty($data['user']['name']))
                                        <h4 class="productpage_title">
                                             العميل : 
                                            {{$data['user']['name']}}
                                        </h4>
                                        @endif

                                        @if(!empty($data['user']['email']))
                                            <p>
                                                <b>
                                                    البريد الالكتروني :
                                                    {{$data['user']['email']}}
                                                </b>
                                            </p>
                                        @endif

                                        @if(!empty($data['user']['phone']))
                                            <p>
                                                <b>
                                                    رقم الجوال :
                                                    {{$data['user']['phone']}}
                                                </b>
                                            </p>
                                        @endif

                                        @if(!empty($data['address']))
                                        <p>
                                            <b class="mb-0">
                                                العنوان :
                                                {{$data['address']}}
                                            </b>
                                        </p>
                                        @endif

                                    </div>
                                </div>

                                <div class="iq-card">
                                    <div class="iq-card-body">

                                        @if(!empty($data['items_price']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    سعر المنتجات:
                                                </b>
                                                {{$data['items_price']}}
                                            </p>
                                        </div>
                                        @endif
        
                                        @if(!empty($data['offer_cost']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    سعر العرض :
                                                </b>
                                                {{$data['offer_cost']}}
                                            </p>
                                        </div>
                                        @else
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    سعر العرض :
                                                </b>
                                                0
                                            </p>
                                        </div>
                                        @endif
        
                                        @if(!empty($data['delivery_cost']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    تكلفه التوصيل :
                                                </b>
                                                {{$data['delivery_cost']}}
                                            </p>
                                        </div>
                                        @endif
        
                                        @if(!empty($data['total_price']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    السعر الكلي :
                                                    {{$data['total_price']}}
                                                </b>
                                            </p>
                                        </div>
                                        @endif
        
                                    </div>
                                </div>
                                
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        @if(!empty($data['payment_type']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    طريقة الدفع :
                                                </b>
                                                @if($data['payment_type'] == 'Transfer')
                                                حوالة بنكية
                                                @elseif($data['payment_type'] == 'Cach')
                                                    عند الاستلام
                                                @elseif($data['payment_type'] == 'Credit Card')
                                                    اون لاين
                                                @endif
                                            </p>
                                        </div>
                                        @endif

                                        @if(!empty($data['status']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    الحالة :
                                                </b>
                                                @if($data['status'] == 'Waiting')
                                                منتظر
                                                @elseif($data['status'] == 'Accepted')
                                                مقبول
                                                @elseif($data['status'] == 'Rejected')
                                                مرفوض
                                                @elseif($data['status'] == 'InProgress')
                                                جاري التحضير
                                                @elseif($data['status'] == 'Done')
                                                تم التسليم
                                                @endif
                                            </p>
                                        </div>
                                        @endif

                                        @if(!empty($data['delivery_time']['delivery_day']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    موعد التسليم :
                                                </b>
                                                {{$data['delivery_time']['delivery_day']}}
                                            </p>
                                        </div>
                                        @endif

                                        @if(!empty($data['delivery_time']['delivery_time_remaining']))
                                        <div class="shipping">
                                            <p class="mb-0">
                                                <b>
                                                    الوقت المتبقي لموعد التسليم :
                                                </b>
                                                {{$data['delivery_time']['delivery_time_remaining']}}
                                            </p>
                                        </div>
                                        @endif

                                        @if(!empty($data['transfer_image']))
                                        <b>
                                            صورة الحوالة
                                        </b>
                                        <a href="{{asset($data['transfer_image'])}}">
                                            <img data-placement="top" data-toggle="tooltip" title="اضغط علي الصورة للتكبير" src="{{asset($data['transfer_image'])}}" style="max-width: 100% ;" />
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        {{-- <div class="dt-buttons btn-group flex-wrap float-right">
                                            <button type="button" class="btn buttons-print" onclick="printDiv('printableArea')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15.271 16.067">
                                                    <g id="Group" style="mix-blend-mode: darken;isolation: isolate">
                                                        <path id="Path_1315" data-name="Path 1315" d="M24.847,3.293h-.413V2.374A2.378,2.378,0,0,0,22.06,0H17.075A2.378,2.378,0,0,0,14.7,2.374v.919h-.376A2.378,2.378,0,0,0,11.95,5.668V9.5a2.378,2.378,0,0,0,2.374,2.374H14.7v3.01a1.188,1.188,0,0,0,1.185,1.185h7.363a1.188,1.188,0,0,0,1.185-1.185v-3.01h.416A2.378,2.378,0,0,0,27.221,9.5V5.668A2.378,2.378,0,0,0,24.847,3.293ZM15.6,2.374A1.478,1.478,0,0,1,17.071.9h4.982a1.478,1.478,0,0,1,1.475,1.475v.919H15.6Zm7.935,12.514a.289.289,0,0,1-.286.286H15.883a.289.289,0,0,1-.286-.286V9.923h7.935ZM26.322,9.5a1.478,1.478,0,0,1-1.475,1.475h-.413V9.923h.593a.45.45,0,1,0,0-.9H14.038a.45.45,0,0,0,0,.9H14.7v1.052h-.376A1.478,1.478,0,0,1,12.849,9.5V5.671A1.478,1.478,0,0,1,14.324,4.2H24.847a1.478,1.478,0,0,1,1.475,1.475Z" transform="translate(-11.95 0)" fill="#ba8a13"></path>
                                                        <path id="Path_1316" data-name="Path 1316" d="M141.1,338.3h5.724a.45.45,0,0,0,0-.9H141.1a.45.45,0,0,0,0,.9Z" transform="translate(-136.364 -326.165)" fill="#ba8a13"></path>
                                                        <path id="Path_1317" data-name="Path 1317" d="M147.827,392.6H142.1a.45.45,0,1,0,0,.9h5.724a.45.45,0,0,0,0-.9Z" transform="translate(-137.331 -379.527)" fill="#ba8a13"></path>
                                                        <path id="Path_1318" data-name="Path 1318" d="M359.412,151.9H358.5a.45.45,0,1,0,0,.9h.912a.45.45,0,0,0,0-.9Z" transform="translate(-346.525 -146.842)" fill="#ba8a13"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div> --}}
                                        <table id="example" class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="all">المنتج</th>
                                                    <th class="all">الصنف</th>
                                                    <th class="all">الكمية</th>
                                                    <th class="all">الشعار</th>
                                                    <th class="all">السعر</th>
                                                    <th class="none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['orderDetails'] as $order)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$order['product']['name']}}</td>
                                                    <td>{{$order['item']['name']}}</td>
                                                    <td>{{$order['quantity']}}</td>
                                                    <td>
                                                        @if(!empty($order['item']['logo']))
                                                        <img src="{{asset($order['item']['logo'])}}" style="width: 50px ;height: 50px;" />
                                                        @endif
                                                    </td>
                                                    <td>{{$order['total_price']}}</td>
                                                    <td class="text-left">
                                                        @if(!empty($order['item_options']))
                                                        <table>
                                                            <thead>
                                                                <th>الاضافه</th>
                                                                <th>سعر الاضافة</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($order['item_options'] as $option)
                                                                <tr>
                                                                    <td>{{$option['option_name']}}</td>
                                                                    <td>{{$option['price']}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.include.footer')
        <!-- ===============================  start vito js files =============================== -->
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
        <!-- ===============================  start datatable js files =============================== -->

        <!-- ===============================  end datatable js files =============================== -->
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                    sort:false,
                    responsive: {
                        details: {
                            type: 'column'
                        }
                    },
                    columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                });

                function expandCollapseAll() {
                    table.rows('.parent').nodes().to$().find('td:first-child').trigger('click').length ||
                    table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click')
                }
            });

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
        <!-- ===============================  end vito js files ================================= -->
    </body>
</html>
