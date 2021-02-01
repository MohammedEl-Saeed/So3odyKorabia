@extends('admin.layout.base')

@section('title', 'Create city')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="row">
    <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">بيانات المدينة</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('cities.update',$item->id)}}" enctype="multipart/form-data">
                        @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">الاسم:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$item->name)}}"  min="3"  max="100" placeholder="Enter a name">
                                </div>
                                    <div class="col-md-6">
                                        <label>الاتاحة:</label>
                                        <select  class="form-control cities" name="availability" value="{{old('availability',$item->availability)}}">
                                            <option value="1" @if($item->availability == 1) selected @endif >متاح</option>
                                            <option value="0" @if($item->availability == 0) selected @endif >غير متاح</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary ml-2 pull-left">تعديل بيانات المدينة</button>
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

