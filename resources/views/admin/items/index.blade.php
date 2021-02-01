@extends('admin.layout.base')

@section('title', 'Items')

@section('content')
@section('main_header', 'Products Section')
@section('sub_header', 'Show All Products')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">View All Items</h5>
                <a href="{{route('items.create',$productId)}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="إضافة {{$type}}">
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
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الوصف</th>
                            <th>الحالة</th>
                            <th>الشعار</th>
                            <th class="text-center">الاجراءات </th>
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
                                            <img src="{{$item->logo}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="profile" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('items.edit',['id'=>$productId,'item'=>$item->id])}}">
                                        <img data-palcement="bottom" data-toggle="tooltip" title="تعديل" src="{{asset('assets/images/icons/edit.svg')}}" class="icons-table" />
                                    </a>
                                    @if($item->status == 'Available')
                                        <a href="{{route('items.unavailable',['productId'=>$productId,'id'=>$item->id])}}">
                                            <img data-palcement="bottom" data-toggle="tooltip" title="Unavailable" src="{{asset('assets/images/icons/unavailabe.svg')}}" class="icons-table" />
                                        </a>
                                    @elseif($item->status == 'Unavailable' || $item->status == 'Sold')
                                        <a href="{{route('items.available',['productId'=>$productId,'id'=>$item->id])}}">
                                            <img data-palcement="bottom" data-toggle="tooltip" title="Available" src="{{asset('assets/images/icons/available.svg')}}" class="icons-table" />
                                        </a>
                                    @endif
                                    @if($item->status == 'Unavailable' || $item->status == 'Available')
                                        <a href="{{route('items.sold',['productId'=>$productId,'id'=>$item->id])}}">
                                            <img data-palcement="bottom" data-toggle="tooltip" title="Sold" src="{{asset('assets/images/icons/sold.svg')}}" class="icons-table" />
                                        </a>
                                    @endif
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

@endsection
