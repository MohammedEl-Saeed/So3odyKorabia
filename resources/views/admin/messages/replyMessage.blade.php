@extends('admin.layout.base')
@section('title', 'messages')
@section('content')
@section('main_header', 'Offers Section')
@section('sub_header', 'Show All Offers')
<div class="row">
    <div class="col-md-12">
        <div class="iq-card iq-border-radius-20">
            <div class="iq-card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="text-primary card-title">
                            <i class="ri-pencil-fill"></i>
                            اكتب رسالة
                        </h5>
                    </div>
                </div>
                <form class="email-form" method="post" action="{{route('messages.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">الي:</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="{{$item->id}}" class="form-control" />
                            <input type="email" name="to" value="{{$item->user->email}}" class="form-control" />
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="cc" class="col-sm-2 col-form-label">Cc:</label>
                        <div class="col-sm-10">
                            <input type="test" name="cc" class="form-control" />
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">الموضوع:</label>
                        <div class="col-sm-10">
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">الرسالة:</label>
                        <div class="col-md-10">
                            <textarea class="textarea form-control" name="message" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <div class="send-btn pl-3">
                                <button type="submit" class="btn btn-primary ">ارسال</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
