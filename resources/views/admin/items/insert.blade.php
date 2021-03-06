@extends('admin.layout.base')

@section('title', 'Create Item')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('items.store', $productId)}}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">أضافه منتج جديد</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if($type == 'Butter')
                                    <img style="border-radius: 0;" class="profile-pic img-fluid" src="{{asset('assets/images/icons/butter.svg')}}" alt="profile-pic">
                                @elseif($type == 'Milk')
                                    <img style="border-radius: 0;" class="profile-pic img-fluid" src="{{asset('assets/images/icons/milk.svg')}}" alt="profile-pic">
                                @elseif($type == 'Egg')
                                    <img style="border-radius: 0;" class="profile-pic img-fluid" src="{{asset('assets/images/icons/egg.svg')}}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{asset('assets/images/Meat-Village-LogoGray.png')}}" alt="profile-pic">
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
                            <h4 class="card-title">بيانات المنتج</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">الاسم:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  min="3"  max="100" placeholder="اسم المنتج">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">كمية الطلب:</label>
                                        <input type="text" class="form-control" id="name" name="order_quantity" value="{{old('order_quantity')}}"  min="3"  max="100" placeholder="كمية الطلب">
                                    </div>
                                    <input type="hidden" value="{{$productId}}" name="product_id">
                                    <div class="form-group col-md-12">
                                        <label>الوصف *</label>
                                        <textarea class="form-control"   name="description" placeholder="وصف المنتج"
                                            rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div id="kt_repeater_1">
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label">خيارات:</label>
                                    <div class="col-md-10" id="repeated-product" data-repeater-list="options">
                                        <div class="row w-100 repeated-products" data-repeater-item="">
                                            <div class="col-md-4">
                                                <label>خيار:</label>
                                                <select  class="form-control options" name="options[0][option_id]" value="{{old('option_id')}}">
                                                    @if(count($data) > 0)
                                                        @foreach($data as $type => $options)
                                                            <optgroup label="{{$type}}">
                                                                @foreach($options as $option)
                                                                    <option value="{{$option['id']}}" @if(old('option_id') == $option['id']) selected @endif>{{$option['name']}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>السعر:</label>
                                                <input type="number" name="options[0][price]" value="{{old('price')}}" class="form-control price" min="0"
                                                    placeholder="سعر المنتج" />
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a class="btn btn-danger delete-product-option" style="margin-top:35px;color:#FFF">
                                                    <i class="la la-trash-o"></i>
                                                    حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label"></label>
                                    <div class="col-lg-10 text-center">
                                        <div class="row w-100">
                                            <div class="col-md-8">
                                                <a class="btn btn-primary add-product-option" style="margin-top:25px;color:#FFF">
                                                    <i class="la la-plus"></i>
                                                    أضافة
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary ml-2 pull-left">أضافة منتج جديد</button>
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
    var counter = 1;
    $('.add-product-option').on('click' , function(){
        counter++;
        var copy = $('#repeated-product .repeated-products:last-of-type'),
            clone = copy.clone(true);
        $('#repeated-product').append(clone);
        $('#repeated-product .repeated-products:last-of-type').find('.price').val(null);
        $('#repeated-product .repeated-products:last-of-type').find('.price').attr('name','options['+counter+'][price]');
        $('#repeated-product .repeated-products:last-of-type').find('.options').attr('name','options['+counter+'][option_id]');
    });
    $('.delete-product-option').on('click' , function(){
        var len = $('#repeated-product .repeated-products').length;
        if(len > 1){
            $(this).parents('.repeated-products').remove();
        }
    });
</script>
@endsection
