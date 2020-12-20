@extends('admin.layout.base')

@section('title', 'Settings')

@section('content')
{{--@section('main_header', 'Xray Section')--}}
@section('sub_header', 'Settings')


<!-- ========================== start new form to add xray center ============================== -->
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-9">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Setting</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">


                   <form class="form" method="post" action="{{route('update.settings')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                        <div class="form-group col-md-12">
                                    <label for="lname"> website phone:</label>
                                    <input type="text" name="website_phone" required min="3" max="100" class="form-control"
                                           placeholder="Enter pharmacy name" value="{{Setting::get('website_phone')}}"/>

                            </div>

                            <div class="form-group col-md-12">
                                <label>Terms *</label>
                                <textarea class="form-control" name="terms" placeholder="Enter Terms and Conditions"
                                    rows="3">{{Setting::get('terms')}}</textarea>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success ml-2 pull-right">Update Settings</button>
                            <button type="reset" class="btn btn-secondary pull-right">Cancel</button>
                            <div class="clearfix"></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ========================== end new form to add doctor ================================ -->

@endsection
