@extends('admin.layout.base')

@section('title', 'Create product')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">أضافة
                            @if($type == 'Sacrifice')
                            ذبيحة جديدة
                            @elseif($type == 'Bird')
                            طائر جديد
                            @else
                            {{$type}}
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if($type == 'Sacrifice')
                                    <img style="border-radius: 0;" class="profile-pic img-fluid" src="{{asset('assets/images/icons/sheep.svg')}}" alt="profile-pic">
                                @elseif($type == 'Bird')
                                    <img style="border-radius: 0;" class="profile-pic img-fluid" src="{{asset('assets/images/icons/chicken.svg')}}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">أضافة شعار</a>
                                    <input class="file-upload" required form="main-form-to-add-doctor" type="file" accept="image/*" name="logo">
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
                            <h4 class="card-title">
                                بيانات
                                @if($type == 'Sacrifice')
                                الذبيحة
                                @elseif($type == 'Bird')
                                الطائر
                                @else
                                {{$type}}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">الاسم:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  min="3"  max="100" placeholder="الاسم">
                                    </div>
                                    <input type="hidden" value="{{$type}}" name="type">
                                    <div class="form-group col-md-12">
                                        <label>الوصف *</label>
                                        <textarea class="form-control"   name="description" placeholder="الوصف"
                                            rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary ml-2 pull-left">أضافة
                                        @if($type == 'Sacrifice')
                                        ذبيحة جديدة
                                        @elseif($type == 'Bird')
                                        طائر جديد
                                        @else
                                        {{$type}}
                                        @endif
                                    </button>
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
