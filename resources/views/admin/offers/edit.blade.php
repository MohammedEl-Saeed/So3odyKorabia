@extends('admin.layout.base')

@section('title', 'Create')

@section('content')


<!-- ========================== start new form to add doctor ============================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Offer Information</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <form id="main-form-to-add-doctor" class="form" method="post" action="{{route('offers.update',$item->id)}}" enctype="multipart/form-data">
                            @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="code">Code:</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{old('code',$item->code)}}"  min="3"  max="100" placeholder="Enter a name">
                                        <span class="form-text text-muted">Please enter offer code</span>
                                    </div>
                                    <div class="col-md-4">
                                            <label>Discount:</label>
                                            <input type="number" min="0" name="discount" class="form-control" value="{{old('discount',$item->discount)}}">
                                            <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Discount Type:</label>
                                        <select  class="form-control options" name="discount_type" value="{{old('discount_type')}}">
                                            <option value="value" @if(old('discount_type') || $item->discunt_type == 'value') selected @endif>Value</option>
                                            <option value="percent" @if(old('discount_type') || $item->discunt_type == 'percent') selected @endif>Percentage</option>
                                        </select>
                                    <div class="d-md-none mb-2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="start_at">Offer Description:</label>
                                        <textarea class="form-control"  name="description" placeholder="Enter a Description"
                                                  rows="3">{{old('description',$item->description)}}</textarea>
                                        <span class="form-text text-muted">Please enter a menu within text length range 50 and 100.</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="start_at">Start at:</label>
                                        <input type="datetime-local" class="form-control" id="start_at" name="start_at" value="{{old('start_at',date('m/d/Y H:m A', strtotime($item->start_at)))}}">
                                        <span class="form-text text-muted">Please enter offer start datetime</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="start_at">End at:</label>
                                        <input type="datetime-local" class="form-control" id="end_at" name="end_at" value="{{old('end_at',$item->end_at,date('m/d/Y H:m A', strtotime($item->end_at)))}}">
                                        <span class="form-text text-muted">Please enter offer end datetime</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Status:</label>
                                        <select  class="form-control options" name="status" value="{{old('status')}}">
                                            <option value="Available" @if(old('status') || $item->status == 'Available') selected @endif>Available</option>
                                            <option value="Unavailable" @if(old('status') || $item->status == 'Unavailable') selected @endif>Unavailable</option>
                                            <option value="Expired" @if(old('status') || $item->status == 'Expired') selected @endif>Expired</option>
                                            <option value="Closed" @if(old('status') || $item->status == 'Closed') selected @endif>Closed</option>
                                            <option value="Reopened" @if(old('status') || $item->status == 'Reopened') selected @endif>Reopened</option>
                                        </select>
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success ml-2 pull-right">Edit Offer</button>
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

