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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'InProgress')

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="inprogressorders">
                    <div class="iq-card">
                        <div class="card-header">
                            <h5 class="card-title">View Rejected Orders</h5>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                    @foreach($Inprogress_orders as $index=>$order)
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
                                <table class="table table-hover table-striped table-bordered datatable-table text-center">
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
                                                <div class="list-user-action">
                                                    <a href="#" class="showPrescription" data-toggle="modal" data-target="#showPrescription" data-Prescriptionimg="{{$order->image}}" data-Prescriptiontext="{{$order->user_note}}">
                                                        <img src="{{asset('assets/icons/show-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Prescription" class="table-icons"/>
                                                    </a>
                                                    @if($order->status == 'Accepted')
                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/reject-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="donePrescription" data-toggle="modal" data-target="#donePrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/done-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="Done" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="sendPrescription" data-toggle="modal" data-target="#sendPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/send-ecipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="send Prescription" class="table-icons"/>
                                                        </a>

                                                    @elseif($order->status == 'Waiting')

                                                        <a href="#" class="rejectPrescription" data-toggle="modal" data-target="#rejectPrescription" data-id="{{$order->id}}">
                                                            <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject Prescription" class="table-icons"/>
                                                        </a>

                                                        <a href="#" class="acceptPrescription" data-toggle="modal" data-target="#acceptPrescription" data-id="{{$order->id}}" >
                                                            <img src="{{asset('assets/icons/accept-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="accept Prescription" class="table-icons"/>
                                                        </a>
                                                    @elseif($order->status == 'Rejected')
                                                        <a href="#" class="rejectreasonPrescription" data-toggle="modal" data-target="#rejectreasonPrescription" data-rejectreason="{{$order->rejected_reasons}}">
                                                            <img src="{{asset('assets/icons/reject-reason-order.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="reject reason" class="table-icons"/>
                                                        </a>
                                                    @endif

                                                    {{--                                                    <a href="#" class="total" data-toggle="modal" data-target="#total-price" data-total="{{$order->id}}">--}}
                                                    {{--                                                        <img src="{{asset('assets/icons/medical-recipe.svg')}}" alt="icons" data-palcement="top" data-toggle="tooltip" title="total price" class="table-icons"/>--}}
                                                    {{--                                                    </a>--}}
                                                </div>

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
