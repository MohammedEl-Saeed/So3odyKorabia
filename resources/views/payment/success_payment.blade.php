<html>
    <head>
        <title>Meat Village</title>
        <link rel="icon" href="{{asset('assets/media/logos/favicon.svg')}}" type="image/x-icon"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            h3{
                padding: 20px;
                background: #EC3C96;
                color: #FFF;
                font-size: 30px;
                margin-top: 0;
            }
            h4{
                color: #EC3C96;
                font-size: 30px;
                font-weight: bold;
                padding: 15px 0 ;
            }
            .p-0{
                padding: 0 !important;
            }
            body{
                padding: 0;
                margin: 0;
                overflow-x: hidden;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-top:30px">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="row" style="border:1px solid #EEE">
                    <div class="col-sm-12 p-0">
                        <h3>Meat Village</h3>
                    </div>
                    <div class="col-sm-4 p-0">
                        <img src="{{asset('assets/images/logos/logo.svg')}}" class="logo">
                    </div>
                    <div class="col-sm-8 p-0">
                        <h4>Thank You.</h4>
                        <p>{!! $message !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>

