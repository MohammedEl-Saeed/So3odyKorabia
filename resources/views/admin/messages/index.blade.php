@extends('admin.layout.base')
@section('title', 'messages')
@section('content')
@section('main_header', 'Offers Section')
@section('sub_header', 'Show All Offers')
<div class="row">
    <div class="col-md-12">
        <div class="iq-card">
            <div class="iq-card-body p-0">
                <div class="">
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                                <ul class="iq-email-sender-list">
                                    @foreach($data as $message)
                                    <li>
                                        <div class="d-flex align-self-center">
                                            <div class="iq-email-sender-info">
                                                <span class="ri-star-line iq-star-toggle"></span>
                                                <a href="javascript: void(0);" class="iq-email-title">
                                                    {{$message->user->name}}
                                                </a>
                                            </div>
                                            <div class="iq-email-content">
                                                <a href="javascript: void(0);" class="iq-email-subject">
                                                    {{$message->text}}
                                                </a>
                                                <div class="iq-email-date">{{ date('h:i A', strtotime($message->created_at))}}</div>
                                            </div>
                                            <ul class="iq-social-media">
                                                <li>
                                                    <a href="#">
                                                        <i class="ri-mail-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <div class="email-app-details">
                                        <div class="iq-card">
                                            <div class="iq-card-body p-0">
                                                <div class="">
                                                    <div class="iq-email-to-list p-3">
                                                        <div class="d-flex justify-content-between">
                                                            <ul>
                                                                <li class="mr-3">
                                                                    <a href="javascript: void(0);">
                                                                        <h4 class="m-0">
                                                                            <i class="ri-arrow-left-line"></i>
                                                                        </h4>
                                                                    </a>
                                                                </li>
                                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="replay">
                                                                    <a href="{{route('messages.reply',$message->id)}}">
                                                                        <i class="ri-mail-open-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-0">
                                                    <div class="iq-inbox-subject p-3">
                                                        <div class="iq-inbox-subject-info">
                                                            <div class="iq-subject-info">
                                                            </div>
                                                            <span class="float-right align-self-center">{{ date('Y M d h:i A', strtotime($message->created_at))}}</span>
                                                            <div class="iq-inbox-body mt-5">
                                                            <p>{{$message->text}}</p>
                                                            <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">{{$message->user->name}}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
