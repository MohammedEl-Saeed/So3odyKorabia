@extends('admin.layout.base')

@section('title', 'Create product')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<form id="main-form-to-add-doctor" class="form" method="post" action="{{route('notifications.send')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">
                                بيانات الاشعار
                            </h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">العنوان:</label>
                                        <input type="text" class="form-control" id="name" name="title" value="{{old('name')}}"  min="3"  max="100" placeholder="الاسم">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>الوصف *</label>
                                        <textarea class="form-control"   name="body" placeholder="الوصف"
                                            rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary ml-2 pull-left"> ارسال اشعار
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
