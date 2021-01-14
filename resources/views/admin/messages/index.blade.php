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
                                                    {{$message->user_id}}
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
                                                            <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">{{$message->user_id}}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <li>
                                        <div class="d-flex align-self-center">
                                            <div class="iq-email-sender-info">
                                            <div class="iq-checkbox-mail">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="mailk3">
                                                    <label class="custom-control-label" for="mailk3"></label>
                                                </div>
                                            </div>
                                            <span class="ri-star-line iq-star-toggle"></span>
                                            <a href="javascript: void(0);" class="iq-email-title">Fabian Ros (Me)</a>
                                            </div>
                                            <div class="iq-email-content">
                                            <a href="javascript: void(0);" class="iq-email-subject">Jecno Mac (@jecnomac) has sent
                                            you a direct message on Twitter! &nbsp;–&nbsp;
                                            <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                            </a>
                                            <div class="iq-email-date">11:49 am</div>
                                            </div>
                                            <ul class="iq-social-media">
                                            <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                            <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                            <li><a href="#"><i class="ri-file-list-2-line"></i></a></li>
                                            <li><a href="#"><i class="ri-time-line"></i></a></li>
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
                                                                <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                            </a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Mail"><a href="#"><i class="ri-mail-open-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Info"><a href="#"><i class="ri-information-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Unread"><a href="#"><i class="ri-mail-unread-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Transfer"><a href="#"><i class="ri-folder-transfer-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="ri-bookmark-line"></i></a></li>
                                                        </ul>
                                                        <div class="iq-email-search d-flex">
                                                        <ul>
                                                            <li class="mr-3">
                                                                <a class="font-size-14" href="#">1 of 505</a>
                                                            </li>
                                                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="iq-inbox-subject p-3">
                                                    <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                    <div class="iq-inbox-subject-info">
                                                        <div class="iq-subject-info">
                                                        <img src="../images/user/user-4.jpg" class="img-fluid rounded-circle" alt="#">
                                                        <div class="iq-subject-status align-self-center">
                                                            <h6 class="mb-0">vito team <a href="dummy@vito.com"><dummy@vito.com></dummy@vito.com></a></h6>
                                                            <div class="dropdown">
                                                                <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                to Me
                                                                </a>
                                                                <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                    <table class="iq-inbox-details">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>from:</td>
                                                                            <td>Medium Daily Digest</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>reply-to:</td>
                                                                            <td>noreply@gmail.com</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>to:</td>
                                                                            <td>iqonicdesigns@gmail.com</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>date:</td>
                                                                            <td>13 Dec 2019, 08:30</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>subject:</td>
                                                                            <td>The Golden Rule</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>security:</td>
                                                                            <td>Standard encryption</td>
                                                                        </tr>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                        </div>
                                                        <div class="iq-inbox-body mt-5">
                                                        <p>Hi Fabian Ros,</p>
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                        <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                        <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                        </div>
                                                        <hr>
                                                        <div class="attegement">
                                                        <h6 class="mb-2">ATTACHED FILES:</h6>
                                                        <ul>
                                                            <li class="icon icon-attegment">
                                                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                            </li>
                                                            <li class="icon icon-attegment">
                                                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                            </li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
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
