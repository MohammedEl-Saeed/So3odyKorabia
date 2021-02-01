@extends('admin.layout.base')

@section('title', 'Options')

@section('content')
@section('main_header', 'Options Section')
@section('sub_header', 'Show All Options')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="iq-card">
            <div class="card-header">
                <h5 class="card-title">عرض الاضافات</h5>
                <a href="{{route('options.create')}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="أضافة جديدة">
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
                            <th>الاسم </th>
                            <th>النوع</th>
                            <th>الاجراءات </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index=>$item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->type}}</td>
                                <td class="text-center">
                                    <a href="{{route('options.edit',$item->id)}}">
                                        <img data-palcement="bottom" data-toggle="tooltip" title="تعديل" src="{{asset('assets/images/icons/edit.svg')}}" class="icons-table" />
                                    </a>
                                    <form action="{{route('options.destroy',$item->id)}}" class="d-inline" method="POST">
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
