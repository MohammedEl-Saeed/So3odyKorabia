@extends('admin.layout.base')

@section('title', 'terms')

@section('content')
{{--@section('main_header', 'Xray Section')--}}
@section('sub_header', 'Settings')


<!-- ========================== start new form to add xray center ============================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">شروط الاستخدام</h4>
                </div>
            </div>
            <div class="iq-card-body">
                {{$data}}
            </div>
        </div>
    </div>
</div>
    <!-- ========================== end new form to add doctor ================================ -->

@endsection
