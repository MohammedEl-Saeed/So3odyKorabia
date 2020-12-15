@extends('admin.layout.base')

@section('title', 'Create Item')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('items.update', $item->id)}}" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Edit New Item</h4>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="add-img-user profile-img-edit">
                                @if($item->logo)
                                    <img class="profile-pic img-fluid" src="{{$item->logo}}" alt="profile-pic">
                                @else
                                    <img class="profile-pic img-fluid" src="{{asset('assets/plugins/vito/images/user/11.png')}}" alt="profile-pic">
                                @endif
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">Edit Logo</a>
                                    <input class="file-upload" @if(is_null($item->logo)) required @endif form="main-form-to-add-doctor" type="file" accept="image/*" name="logo">
                                    <input type="hidden" value="{{$item->logo}}" name="logo_path">
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
                            <h4 class="card-title">New Item Information</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$item->name)}}"  min="3"  max="100" placeholder="Enter a name">
                                        <span class="form-text text-muted">Please enter product name</span>
                                    </div>
                                    <input type="hidden" value="{{$item->product_id}}" name="product_id">
                                    <div class="form-group col-md-12">
                                        <label>description *</label>
                                        <textarea class="form-control"   name="description" placeholder="Enter a Description"
                                            rows="3">{{old('description',$item->description)}}</textarea>
                                        <span class="form-text text-muted">Please enter a menu within text length range 50 and 100.</span>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div id="kt_repeater_1">
                                    <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Options:</label>
                                    <div class="col-md-10" id="repeated-product" data-repeater-list="options">
                                        @if(count($item->options) > 0)
                                            @foreach($item->options as $index => $itemOption)
                                                <div class="row w-100 repeated-products" data-repeater-item="">
                                            <div class="col-md-4">
                                                <label>Option:</label>
                                                <select  class="form-control options" name="options[{{$index}}][option_id]" value="{{old('option_id')}}">
                                                    @if(count($data) > 0)
                                                        @foreach($data as $type => $options)
                                                            <optgroup label="{{$type}}">
                                                                @foreach($options as $option)
                                                                    <option value="{{$option['id']}}" @if($itemOption->id == $option['id']) selected @endif>{{$option['name']}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price:</label>
                                                <input type="number" name="options[{{$index}}][price]" value="{{old('price', $itemOption->pivot->price)}}" class="form-control price" min="0"
                                                      placeholder="Enter Price" />
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a class="btn btn-danger delete-product-option" style="margin-top:35px;color:#FFF">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                            @endforeach
                                        @endif
                                        <div class="row w-100 repeated-products" data-repeater-item="">
                                            <div class="col-md-4">
                                                <label>Option:</label>
                                                <select  class="form-control options" name="options[{{count($item->options)}}][option_id]" value="{{old('option_id')}}">
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
                                                <label>Price:</label>
                                                <input type="number" name="options[{{count($item->options)}}][price]" value="{{old('price')}}" class="form-control price" min="0"
                                                       placeholder="Enter Price" />
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a class="btn btn-danger delete-product-option" style="margin-top:35px;color:#FFF">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
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
                                                    Add
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Edit New Item</button>
                                    <button type="reset" class="btn btn-secondary pull-right">Cancel</button>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
<!-- ========================== end new form to add doctor ================================ -->
@endsection
@section('script')
<script>
    var optionsCount = "{{count($item->options)}}";
    var counter =  parseInt(optionsCount) + 1;
    $('.add-product-option').on('click' , function(){
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
