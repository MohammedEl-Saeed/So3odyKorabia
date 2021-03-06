@extends('admin.layout.base')

@section('title', 'family pharmacy')

@section('content')
@section('main_header', 'Pharmacy Section')
@section('sub_header', 'Show All Pharmacies')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--begin::Card-->
            <div class="iq-card">
                <div class="card-header">
                    <h5 class="card-title">View All Pharmacies</h5>
                    <a href="{{route('admin.pharmacy.insert')}}" class="btn btn-text-primary font-weight-bold btn-fixed" data-palcement="top" data-toggle="tooltip" title="Insert Pharmacy">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <!--begin: Datatable-->
                        <table class="table table-striped table-bordered mt-4 table-hover text-center datatable-example" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Center Name</th>
                                <th>phone</th>
                                <th>Creation Date</th>
                                <th class="text-center">الاجراءات </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $index=>$item)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->birth_date}}</td>
                                    <td class="text-center">
                                        <div class="list-user-action">
                                            <a href="{{route('admin.pharmacy.show',$item->id)}}">
                                                <img src="{{asset('assets/icons/show-profile-1.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="profile" />
                                            </a>
{{--                                            <a href="{{route('admin.pharmacy.get.services',$item->id)}}">--}}
{{--                                                <img src="{{asset('assets/icons/show-profile.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="Services" />--}}
{{--                                            </a>--}}
                                            <a href="{{route('admin.pharmacy.get.times',$item->id)}}">
                                                <img src="{{asset('assets/icons/show-time.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="Times" />
                                            </a>
                                            @if($item->block == 0)
                                                    <a href="#" data-toggle="modal" data-target="#blockModal" class="modal-block" data-modal="{{$item->id}}">
                                                        <img src="{{asset('assets/icons/block-doctor.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="block"/>
                                                    </a>
                                                @else
                                                    <a href="{{route('admin.pharmacy.unblock',$item->id)}}"  >
                                                        <img src="{{asset('assets/icons/unblock doctor.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="unblock"/>
                                                    </a>
                                                @endif

                                            <a href="{{route('admin.pharmacy.show_monthly_financial',$item->id)}}">
                                                <img src="{{asset('assets/icons/financial.svg')}}" alt="icon" class="table-icons" data-palcement="top" data-toggle="tooltip" title="Monthly Financial" />
                                            </a>
                                        </div>
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
        let url = "{{ route('admin.pharmacy.block.status', ':id') }}";
        url = url.replace(':id', id);
        $('#blockModal form').attr('action' , url);

    });
});
</script>
@endsection
