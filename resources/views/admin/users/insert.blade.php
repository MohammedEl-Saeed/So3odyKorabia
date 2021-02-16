@extends('admin.layout.base')

@section('title', 'Create User')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">أضافة مستخدم جديد</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{asset('assets/images/user.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">أضافة صورة شخصية</a>
                                    <input class="file-upload" form="main-form-to-add-doctor" type="file" accept="image/*" name="image">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">بيانات المستخدم</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">الاسم:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  min="3"  max="100" placeholder="الاسم">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">رقم الجوال:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}"  min="10"  placeholder="رقم الجوال">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">البريد الالكتروني:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"  placeholder="البريد الالكتورني">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">كلمة المرور:</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"  min="6"  placeholder="كلمة المرور">
                                    </div>
                                    <input type="hidden" value="User" name="type">

                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary ml-2 pull-left">أضافة مستخدم جديد</button>
                                    <button type="reset" class="btn btn-secondary pull-left">الغاء</button>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
<!-- ========================== end new form to add doctor ================================ -->
@endsection
@section('script')
<script>
    $('.add-product-option').on('click' , function(){
        var copy = $('#repeated-product .repeated-products:last-of-type'),
            clone = copy.clone(true);
        $('#repeated-product').append(clone);
        $('#repeated-product .repeated-products:last-of-type').find('.price').val(null);
    });
    $('.delete-product-option').on('click' , function(){
        var len = $('#repeated-product .repeated-products').length;
        if(len > 1){
            $(this).parents('.repeated-products').remove();
        }
    });

</script>
@endsection
