@extends('admin.layout.base')

@section('title', 'Settings')

@section('content')
{{--@section('main_header', 'Xray Section')--}}
@section('sub_header', 'Settings')


<!-- ========================== start new form to add xray center ============================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">الاعدادات</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if(session()->has('success'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{{session()->get('success')}}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                        </button>
                    </div>
                @endif
                <div class="new-user-info">
                    <form class="form" method="post" action="{{route('update.settings')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-6">
                                        <label for="lname"> رقم الجوال:</label>
                                        <input type="text" name="website_phone" required min="3" max="100" class="form-control"
                                            placeholder="رقم الجوال" value="{{Setting::get('website_phone')}}"/>

                            </div>

                            <div class="form-group col-md-12">
                                <label>شروط الاستخدام *</label>
                                <textarea class="form-control" name="terms" placeholder="شروط الاستخدام"
                                    rows="3">{{Setting::get('terms')}}</textarea>

                            </div>

                            <div class="form-group col-md-12">
                                <label>سياسة الخصوصية *</label>
                                <textarea class="form-control" name="privacy" placeholder="سياسة الخصوصية"
                                    rows="3">{{Setting::get('privacy')}}</textarea>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary ml-2 pull-left">تعديل الاعدادت</button>
                            <button type="reset" class="btn btn-secondary pull-left">الغاء</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ========================== end new form to add doctor ================================ -->

@endsection
