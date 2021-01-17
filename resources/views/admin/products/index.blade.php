@extends('admin.layout.base')

@section('title', 'Products')

@section('content')
@section('main_header', 'Products Section')
@section('sub_header', 'Show All Products')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">View All {{$type}}</h5>
                <a href="{{route('products.create',$type)}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="Insert {{$type}}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="iq-card-body">
                @if(session()->has('success'))
                    <div class="alert text-white bg-success" role="alert">
                        <div class="iq-alert-text">{{session()->get('success')}}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-striped table-bordered mt-4 datatable-example table-hover text-center" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Logo</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index=>$item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->status}}</td>
                                <td class="text-center">
                                    <div class="list-user-action">
                                            <img src="{{asset($item->logo)}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="icon" />
                                    </div>
                                </td>
                                <td class="text-center">
{{--                                    <div class="list-user-action">--}}
                                    <a href="{{route('items.index',$item->id)}}" class="btn btn-info">
                                        الأنواع
                                    </a>
                                    <a href="{{route('products.edit',['type'=>$type,'id'=>$item->id])}}" class="btn btn-primary">
                                            Edit
                                    </a>
                                    @if($item->status == 'Available')
                                        <a href="{{route('products.unavailable',['type'=>$type,'id'=>$item->id])}}" class="btn btn-danger">
                                                Unavailable
                                        </a>
                                    @elseif($item->status == 'Unavailable' || $item->status == 'Sold')
                                        <a href="{{route('products.available',['type'=>$type,'id'=>$item->id])}}" class="btn btn-success">
                                            Available
                                        </a>
                                    @endif
                                    @if($item->status == 'Unavailable' || $item->status == 'Available')
                                        <a href="{{route('products.sold',['type'=>$type,'id'=>$item->id])}}" class="btn btn-warning">
                                            Sold
                                        </a>
                                    @endif
{{--                                    </div>--}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade"  id="blockModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Are you sure you want to Change Blocking Status ?</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <textarea name="blocked_reason" class="form-control input-r"></textarea>
                    <div class="form-group mt-3">
                        <input type="submit" class="block-btn btn btn-danger pull-right" value="block" />
                        <button class="btn btn-secondary pull-right mr-2" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/vito/'.trans('dashboard.lang').'/js/jquery.min.js?v=7.0.3')}}"></script>
<script>
$(document).ready(function(){


    // reject
    $('.list-user-action').on("click" , ".modal-block" , function(){
        var id = $(this).data('modal');
        {{--let url = "{{ route('products.block.status', ':id') }}";--}}
        url = url.replace(':id', id);
        $('#blockModal form').attr('action' , url);

    });
});
</script>
@endsection
