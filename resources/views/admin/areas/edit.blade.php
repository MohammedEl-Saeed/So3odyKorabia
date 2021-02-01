@extends('admin.layout.base')
@section('title' , 'Edit Area')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">معلومات المنظقه</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('areas.update',$item->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">الاسم:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$item->name)}}"  min="3"  max="100" placeholder="اسم المنطقة">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery_time">وقت التوصيل:</label>
                                    <input type="text" class="form-control" id="delivery_time" name="delivery_time" value="{{old('delivery_time',$item->delivery_time)}}"  min="3"  max="100" placeholder="وقت اللتوصيل">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery_cost">تكلفة التوصيل:</label>
                                    <input type="text" class="form-control" id="delivery_cost" name="delivery_cost" value="{{old('delivery_cost',$item->delivery_cost)}}"  min="3"  max="100" placeholder="تكلفة التوصيل">
                                </div>
                                <div class="col-md-6">
                                    <label>المدينة:</label>
                                    <select class="form-control" name="city_id" value="{{old('city_id')}}">
                                        @foreach($cities as $id => $city)
                                            <option value="{{$id}}" @if(old('city_id',$item->city_id) == $id) selected @endif>{{$city}}</option>
                                        @endforeach
                                    </select>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-left">تعديل بيانات المنظقه</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
