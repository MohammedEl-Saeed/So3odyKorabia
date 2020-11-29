@extends('admin.layout.base')

@section('title', 'Create option')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">New Option Information</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('options.update')}}" enctype="multipart/form-data">
                            @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$item->name)}}"  min="3"  max="100" placeholder="Enter a name">
                                        <span class="form-text text-muted">Please enter option name</span>
                                    </div>
                                        <div class="col-md-4">
                                            <label>Type:</label>
                                            <select  class="form-control options" name="type" value="{{old('type',$item->name)}}">
                                                @if(isset($types))
                                                    @foreach($types as $type)
                                                        <option value="{{$type}}" @if(old('type') || $item->type == $type) selected @endif>{{$type}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="d-md-none mb-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Edit New Option</button>
                                    <button type="reset" class="btn btn-secondary pull-right">Cancel</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- ========================== end new form to add doctor ================================ -->
@endsection
