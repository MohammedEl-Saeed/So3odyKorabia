@extends('admin.layout.base')

@section('title', 'Offers')

@section('content')
@section('main_header', 'Offers Section')
@section('sub_header', 'Show All Offers')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">View All Offers</h5>
                <a href="{{route('offers.create')}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="Insert Pharmacy">
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
                    <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Uses number</th>
                            <th>Count number</th>
                            <th>Start at</th>
                            <th>End at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index=>$item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->discount}}</td>
                                <td>{{$item->uses_number}}</td>
                                <td>{{$item->count}}</td>
                                <td>{{$item->start_at}}</td>
                                <td>{{$item->end_at}}</td>
                                <td class="text-center">
                                    {{--                                    <div class="list-user-action">--}}
                                    <a href="{{route('offers.edit',$item->id)}}" class="btn btn-info">
                                        Edit
                                    </a>
                                    <form action="{{route('offers.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
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
        {{--let url = "{{ route('offers.block.status', ':id') }}";--}}
        url = url.replace(':id', id);
        $('#blockModal form').attr('action' , url);

    });
});
</script>
@endsection
