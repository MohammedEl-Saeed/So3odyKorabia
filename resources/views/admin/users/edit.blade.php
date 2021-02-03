@extends('admin.layout.base')

@section('title', 'Create user')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('users.update', $item->id)}}" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">تعديل بيانات المستخدم</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if($item->image)
                                    <img class="profile-pic img-fluid" src="{{$item->image}}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">تعديل الصورة الشخصية</a>
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
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $item->name)}}"  min="3"  max="100" placeholder="الاسم">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">رقم الجوال:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $item->phone)}}"  min="10"  placeholder="رقم الجوال">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">البريد الالكتروني:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email', $item->email)}}"  placeholder="البريد الالكتروني">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">كلمة المرور:</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" min="6" placeholder="كلمة المرور" autocomplete="new-password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">تاكيد كلمة المرور:</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" min="6" placeholder="تاكيد كلمة المرور" autocomplete="new-password">
                                </div>
                                <input type="hidden" value="User" name="type">

                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary ml-2 pull-left">تعديل بيانات المستخدم</button>
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
    $('.add-user-option').on('click' , function(){
        var copy = $('#repeated-user .repeated-users:last-of-type'),
            clone = copy.clone(true);
        $('#repeated-user').append(clone);
        $('#repeated-user .repeated-users:last-of-type').find('.price').val(null);
    });
    $('.delete-user-option').on('click' , function(){
        var len = $('#repeated-user .repeated-users').length;
        if(len > 1){
            $(this).parents('.repeated-users').remove();
        }
    });

</script>
@endsection
