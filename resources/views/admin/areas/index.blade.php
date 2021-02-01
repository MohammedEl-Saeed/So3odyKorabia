@extends('admin.layout.base')
@section('title', 'Area')
@section('content')
@section('main_header', 'Area Section')
@section('sub_header', 'Show All Areas')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">عرض كل المناظق</h5>
                <a href="{{route('areas.create')}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="أضافة منظقه">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="iq-card-body">
                @if(session()->has('success'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{{session()->get('success')}}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <!--begin: Datatable-->
                    <table class="table table-striped table-bordered mt-4 datatable-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>وقت التوصيل </th>
                            <th>تكلفة التوصيل</th>
                            <th>المنظقة</th>
                            <th>الاجرارت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $i=>$area)
                            <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$area->name}}</td>
                                <td>{{$area->delivery_time}}</td>
                                <td>{{$area->delivery_cost}}</td>
                                <td>{{$area->city->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('areas.edit',$area->id)}}" >
                                        <img data-palcement="bottom" data-toggle="tooltip" title="تعديل" src="{{asset('assets/images/icons/edit.svg')}}" class="icons-table" />
                                    </a>
                                    <form action="{{route('areas.destroy',$area->id)}}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button class="del-btn">
                                            <img data-palcement="bottom" data-toggle="tooltip" title="حذف" src="{{asset('assets/images/icons/delete.svg')}}" class="icons-table" />
                                        </button>
                                    </form>
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
