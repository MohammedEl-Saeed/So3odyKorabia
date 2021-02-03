@extends('admin.layout.base')

@section('title', 'Create')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="row">
    <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">بيانات العرض</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('offers.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="code">الكود :</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}"  min="3"  max="100" >
                                </div>
                                <div class="col-md-4">
                                        <label>الخصم:</label>
                                        <input type="number" min="0" max="100" name="discount" class="form-control" value="{{old('discount')}}">
                                        <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-4">
                                    <label>عدد مرات الاستخدام</label>
                                    <input type="number" min="0" name="uses_number" class="form-control" value="{{old('uses_number')}}">
                                    <div class="d-md-none mb-2"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="start_at">يبدا في :</label>
                                    <input type="datetime-local" class="form-control" id="start_at" name="start_at" value="{{old('start_at')}}"  min="3"  max="100" placeholder="Enter a name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start_at">ينتهي في:</label>
                                    <input type="datetime-local" class="form-control" id="end_at" name="end_at" value="{{old('end_at')}}"  min="3"  max="100" placeholder="Enter a name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>الصورة:</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="start_at">وصف العرض:</label>
                                    <textarea class="form-control"  name="description" placeholder="وصف العرض" rows="3">{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary ml-2 pull-left">أضافة عرض جديد</button>
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

