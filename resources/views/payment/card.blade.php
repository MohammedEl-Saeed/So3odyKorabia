<html>
<head>
    <title>Test Hosted Session</title>
    <link rel="icon" href="{{asset('assets/media/logos/favicon.svg')}}" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
    <script src="https://api.vapulus.com:1338/app/session/script?appId=738bdc3e-167e-4afb-aeb9-a3a535c8ac53"></script>
    <!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
    <style id="antiClickjack">
        body {
            display: none !important;
            background-color: #EFEFEF !important;
        }
    </style>
</head>

<body style="background-color:  #EFEFEF">
<section class="text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Hosted Session</h1>
        <p class="lead text-muted">Vapulus Hosted Session Integration Sample.</p>
    </div>
</section>
<!-- CREATE THE HTML FOR THE PAYMENT PAGE -->
<div class="container">
    <div class="iq-card">
        <div class="iq-card-body" style="padding: 15px;background-color: #FFF;border-radius: 15px">
            <div class="row">
                <div class="contents col-12">
                    @if($errors->any())
                        <div class="alert alert-danger" style="margin-right: 15px;margin-left: 15px" role="alert">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="alert alert-danger alert-errors"
                         style="margin-right: 15px;margin-left: 15px ; display: none" role="alert">
                        <p class="mb-0 alert-errors"></p>
                    </div>
                    <form id="payForm" method="post" action="{{route('vapulusPayment.pay')}}">
                        @csrf
                        <input type="hidden" name="order_id" id="order_id" value="{{$orderId}}" readonly/>
                        <input type="hidden" name="sessionId" id="sessionId" readonly/>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="cardNumber">Card number:</label>
                            <input type="text" id="cardNumber" class="form-control input-md" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="cardMonth">Expiry month:</label>
                            <input type="text" id="cardMonth" class="form-control input-md"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-8 control-label" for="cardYear">Expiry year:</label>
                            <input type="text" id="cardYear" class="form-control input-md"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-8 control-label" for="cardCVC">Security code:</label>
                            <input type="text" id="cardCVC" class="form-control input-md" readonly/>
                        </div>
                    </form>
                    <button class="btn btn-primary pull-right" id="payButton" style="margin-right: 15px"
                            onclick="pay();">Pay
                    </button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT FRAME-BREAKER CODE TO PROVIDE PROTECTION AGAINST IFRAME CLICK-JACKING -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (window.PaymentSession) {
        PaymentSession.configure({
            fields: {
                // ATTACH HOSTED FIELDS IDS TO YOUR PAYMENT PAGE FOR A CREDIT CARD
                card: {
                    cardNumber: "cardNumber",
                    securityCode: "cardCVC",
                    expiryMonth: "cardMonth",
                    expiryYear: "cardYear"
                }
            },
            callbacks: {
                initialized: function (err, response) {
                    console.log("init....");
                    console.log(err, response);
                    console.log("/init.....");
                    // HANDLE INITIALIZATION RESPONSE
                },
                formSessionUpdate: function (err, response) {
                    console.log("update callback.....");
                    console.log(err, response);
                    $('.alert-errors').fadeIn(400);
                    $('.alert-errors').empty();
                    $('.alert-errors').append(`<p class="mb-0">` + response.message + `</p>`);
                    console.log(`<p class="mb-0">` + response.message + `</p>`);
                    console.log("/update callback....");
                    // HANDLE RESPONSE FOR UPDATE SESSION
                    if (response.statusCode) {
                        if (200 == response.statusCode) {
                            document.getElementById("sessionId").value = response.data.sessionId; //set value on myInputID
                            $('#payForm').submit();
                        } else if (201 == response.statusCode) {
                            console.log("Session update failed with field errors.");
                            if (response.message) {
                                var field = response.message.indexOf('valid')
                                field = response.message.slice(field + 5, response.message.length);
                                console.log(field + " is invalid or missing.");
                            }
                        } else {
                            alert(response);
                            console.log("Session update failed: " + response);
                        }
                    }
                }
            }
        });
    } else {
        alert('Fail to get app/session/script !\n\nPlease check if your appId added in session script tag in head section?')
    }

    function pay() {
        // UPDATE THE SESSION WITH THE INPUT FROM HOSTED FIELDS
        PaymentSession.updateSessionFromForm();
    }
</script>


</body>

</html>
