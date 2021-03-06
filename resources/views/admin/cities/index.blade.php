@extends('admin.layout.base')
@section('title', 'City')
@section('content')
@section('main_header', 'City Section')
@section('sub_header', 'Show All Cities')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">عرض المدن</h5>
                <a href="{{route('cities.create')}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="أضافة مدينة">
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
                    <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الاتاحة</th>
                            <th>الاجراءات </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index=>$item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if($item->availability == 1)
                                        متاح
                                    @elseif($item->availability == 0)
                                        غير متاح
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('cities.edit',$item->id)}}">
                                        <img data-palcement="bottom" data-toggle="tooltip" title="تعديل" src="{{asset('assets/images/icons/edit.svg')}}" class="icons-table" />
                                    </a>
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
