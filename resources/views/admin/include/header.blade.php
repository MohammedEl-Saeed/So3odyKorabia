<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{url('/')}}">
            <img src="{{asset('assets/plugins/vito/images/logo.gif')}}" class="img-fluid" alt="">
            <span>Vito</span>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>
                    <div class="hover-circle">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul class="iq-menu">
                <li>
                    <a href="{{route('products.index','Sacrifice')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/sheep.png')}}" class="images-sidebar"/>
                        <span> ذبائح </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index','Bird')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/chicken.png')}}" class="images-sidebar">
                        <span > طيور </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index','Butter')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/butter.png')}}" class="images-sidebar">
                        <span > سمن </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index','Milk')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/milk.png')}}" class="images-sidebar">
                        <span >ألبان  </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index','Egg')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/egg.png')}}" class="images-sidebar">
                        <span > بيض </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('options.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/options.png')}}" class="images-sidebar">
                        <span >إضافات </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('offers.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/offer.png')}}" class="images-sidebar">
                        <span > عروض </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('orders.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/order.png')}}" class="images-sidebar">
                        <span > طلبات </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('cities.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/place.png')}}" class="images-sidebar">
                        <span > المناطق </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/farmer.png')}}" class="images-sidebar">
                        <span > العملاء </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show.settings.form')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/settings.png')}}" class="images-sidebar">
                        <span > الإعدادات </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>

<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <div class="iq-sidebar-logo">
            <div class="top-logo">
                <a href="index.html" class="logo">
                <img src="{{asset('assets/plugins/vito/images/logo.gif')}}" class="img-fluid" alt="">
                <span>vito</span>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-search-bar">
                <form action="#" class="searchbox">
                <input type="text" class="text search-input" placeholder="Type here to search...">
                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ri-menu-3-line"></i>
            </button>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                <li class="nav-item">
                    <a class="search-toggle iq-waves-effect language-title" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-01.png')}}" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i></a>
                    <div class="iq-sub-dropdown">
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-02.png')}}" alt="img-flaf" class="img-fluid mr-2" />French</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-03.png')}}" alt="img-flaf" class="img-fluid mr-2" />Spanish</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-04.png')}}" alt="img-flaf" class="img-fluid mr-2" />Italian</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-05.png')}}" alt="img-flaf" class="img-fluid mr-2" />German</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-06.png')}}" alt="img-flaf" class="img-fluid mr-2" />Japanese</a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="search-toggle iq-waves-effect" href="#"><i class="ri-calendar-line"></i></a>
                    <div class="iq-sub-dropdown">
                        <div class="calender-small"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="search-toggle iq-waves-effect">
                        <div id="lottie-beil"></div>
                        <span class="bg-danger dots"></span>
                    </a>
                    <div class="iq-sub-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                                <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                            </div>

                            <a href="#" class="iq-sub-card" >
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="{{asset('assets/plugins/vito/images/user/01.jpg')}}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">Emma Watson Nik</h6>
                                        <small class="float-right font-size-12">Just Now</small>
                                        <p class="mb-0">95 MB</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="{{asset('assets/plugins/vito/images/user/02.jpg')}}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">New customer is join</h6>
                                        <small class="float-right font-size-12">5 days ago</small>
                                        <p class="mb-0">Jond Nik</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="{{asset('assets/plugins/vito/images/user/03.jpg')}}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">Two customer is left</h6>
                                        <small class="float-right font-size-12">2 days ago</small>
                                        <p class="mb-0">Jond Nik</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="{{asset('assets/plugins/vito/images/user/04.jpg')}}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">New Mail from Fenny</h6>
                                        <small class="float-right font-size-12">3 days ago</small>
                                        <p class="mb-0">Jond Nik</p>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{route('messages')}}" class="search-toggle iq-waves-effect">
                        <div id="lottie-mail"></div>
                        <span class="bg-primary count-mail"></span>
                    </a>
                </li>
                </ul>
            </div>
            <ul class="navbar-list">
                <li>
                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                    <img src="{{asset('assets/plugins/vito/images/user/1.jpg')}}" class="img-fluid rounded mr-3" alt="user">
                    <div class="caption">
                        <h6 class="mb-0 line-height">Nik jone</h6>
                        <span class="font-size-12">Available</span>
                    </div>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                    <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
                            <span class="text-white font-size-12">Available</span>
                            </div>
                            <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-file-user-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">My Profile</h6>
                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                </div>
                            </div>
                            </a>
                            <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-profile-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Edit Profile</h6>
                                    <p class="mb-0 font-size-12">Modify your personal details.</p>
                                </div>
                            </div>
                            </a>
                            <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-account-box-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Account settings</h6>
                                    <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                </div>
                            </div>
                            </a>
                            <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-lock-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Privacy Settings</h6>
                                    <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                </div>
                            </div>
                            </a>
                            <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn" onclick="document.getElementById('submit-form').submit()" href="#" role="button">
                                    Logout
                                    <i class="ri-login-box-line ml-2"></i>
                                </a>
                                <form id="submit-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
            </ul>
        </nav>

    </div>
</div>
