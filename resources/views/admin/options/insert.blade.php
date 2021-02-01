@extends('admin.layout.base')

@section('title', 'Create option')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="row">
    <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">بيانات الاضافة</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('options.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">الاسم:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  min="3"  max="100" placeholder="اسم الاضافة">
                                </div>
                                <div class="col-md-6">
                                    <label>النوع:</label>
                                    <select  class="form-control options" name="type" value="{{old('type')}}">
                                        @if(isset($types))
                                            @foreach($types as $type)
                                                <option value="{{$type}}" @if(old('type') == $type) selected @endif>{{$type}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary ml-2 pull-left">أضافة جديدة</button>
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

