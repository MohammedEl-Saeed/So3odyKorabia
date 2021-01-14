@extends('admin.layout.base')

@section('title', 'Offers')

@section('content')
@section('main_header', 'Offers Section')
@section('sub_header', 'Show All Offers')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills d-flex align-items-end profile-feed-items p-0 m-0">
                        <li>
                            <a class="nav-link active" data-toggle="pill" href="#allorders">All</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#todayorders">Today</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#neworders">New</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#pastorders">Past</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#acceptedorders">Accepted</a>
                        </li>
                        <li>
                            <a class="nav-link" data-toggle="pill" href="#rejectedorders">Rejected</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="allorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View All Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered datatable-example datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{--<th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'InProgress')
                                                    <div class="btn btn-info">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="todayorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View Today Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable-example table-bordered datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{--<th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($today_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="neworders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View New Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable-example table-bordered datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{-- <th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($new_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pastorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View Past Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable-example table-bordered datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{--<th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($done_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="acceptedorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View Accepted Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable-example table-bordered datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{--<th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($accepted_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="rejectedorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View Rejected Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable-example table-bordered datatable-table text-center">
                                    <thead>
                                    <tr>
                                        <th>Record ID</th>
                                        <th>Price</th>
                                        <th>User</th>
                                        {{-- <th>Service</th>--}}
                                        <th>Status</th>


                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rejected_orders as $index=>$order)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>
                                                <a href="{{route('user.orders' ,$order->user->id)}}">{{$order->user->name}}
                                                </a>
                                            </td>
                                            {{--<td> {{$order->doctor_time->service->name}}</td>--}}
                                            <td>
                                                @if($order->status == 'Accepted')
                                                    <div class="btn btn-primary">{{$order->status}}</div>
                                                @elseif($order->status == 'Rejected')
                                                    <div class="btn btn-danger">{{$order->status}}</div>
                                                @elseif($order->status == 'Waiting')
                                                    <div class="btn btn-warning">{{$order->status}}</div>
                                                @elseif($order->status == 'Done')
                                                    <div class="btn btn-success">{{$order->status}}</div>
                                                @endif
                                            </td>


                                            <td>
                                                {{--                                                 <div class="list-user-action">--}}
                                                @if($order->status == 'Waiting')
                                                    <a href="{{route('orders.accept',$order->id)}}" class="btn btn-success">
                                                        Accept
                                                    </a>
                                                    <a href="{{route('orders.reject',$order->id)}}" class="btn btn-danger">
                                                        Reject
                                                    </a>
                                                    {{--                                                @elseif(($order->status == 'Accepted')--}}
                                                @endif
                                                @if($order->status == 'Accepted')
                                                    <a href="{{route('orders.done',$order->id)}}" class="btn btn-success">
                                                        Done
                                                    </a>
                                                @endif
                                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">
                                                    View
                                                </a>
                                                {{--                                                </div>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
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
        {{--let url = "{{ route('orders.block.status', ':id') }}";--}}
        url = url.replace(':id', id);
        $('#blockModal form').attr('action' , url);

    });
});
</script>
@endsection
