<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{url('/')}}">
            <img src="{{asset('assets/images/logos/logo.svg')}}" class="img-fluid" alt="meat-village logo">
            <p class="logo-text" style="padding: 10px 10px 0 0;font-size: 24px;color: #4C2910;"> قرية اللحوم </p>
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
                <li class="{{active_link('products' , 'Sacrifice')}}">
                    <a href="{{route('products.index','Sacrifice')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/sheep.svg')}}" class="images-sidebar"/>
                        <span> ذبائح </span>
                    </a>
                </li>

                <li class="{{active_link('products' , 'Bird')}}">
                    <a href="{{route('products.index','Bird')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/chicken.svg')}}" class="images-sidebar">
                        <span > طيور </span>
                    </a>
                </li>

                <li class="{{active_link('products' , 'Butter')}}">
                    <a href="{{route('products.index','Butter')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/butter.svg')}}" class="images-sidebar">
                        <span > سمن </span>
                    </a>
                </li>

                <li class="{{active_link('products' , 'Milk')}}">
                    <a href="{{route('products.index','Milk')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/milk.svg')}}" class="images-sidebar">
                        <span >ألبان  </span>
                    </a>
                </li>

                <li class="{{active_link('products' , 'Egg')}}">
                    <a href="{{route('products.index','Egg')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/egg.svg')}}" class="images-sidebar">
                        <span > بيض </span>
                    </a>
                </li>

                <li class="{{active_link('options')}}">
                    <a href="{{route('options.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/options.svg')}}" class="images-sidebar">
                        <span >إضافات </span>
                    </a>
                </li>

                <li class="{{active_link('offers')}}">
                    <a href="{{route('offers.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/offer.svg')}}" class="images-sidebar">
                        <span > عروض </span>
                    </a>
                </li>

                <li class="{{active_link('orders')}}">
                    <a href="{{route('orders.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/order.svg')}}" class="images-sidebar">
                        <span > طلبات </span>
                    </a>
                </li>

                <li class="{{active_link('cities')}}">
                    <a href="{{route('cities.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/cities.svg')}}" class="images-sidebar">
                        <span > المدن </span>
                    </a>
                </li>

                <li class="{{active_link('areas')}}">
                    <a href="{{route('areas.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/map.svg')}}" class="images-sidebar">
                        <span > المناطق </span>
                    </a>
                </li>

                <li class="{{active_link('users')}}">
                    <a href="{{route('users.index')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/farmer.svg')}}" class="images-sidebar">
                        <span > العملاء </span>
                    </a>
                </li>

                <li class="{{active_link('notifications')}}">
                    <a href="{{route('notifications.create')}}" class="iq-waves-effect">
                        <span class="images-sidebar" id="lottie-beil"></span>
                        <span > إرسال إشعارات </span>
                    </a>
                </li>

                <li class="{{active_link('show' , 'settings')}}">
                    <a href="{{route('show.settings.form')}}" class="iq-waves-effect">
                        <img src="{{asset('assets/images/icons/settings.svg')}}" class="images-sidebar">
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
            {{-- <div class="iq-search-bar">
                <form action="#" class="searchbox">
                <input type="text" class="text search-input" placeholder="Type here to search...">
                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                </form>
            </div> --}}
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
                {{-- <li class="nav-item">
                    <a class="search-toggle iq-waves-effect language-title" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-01.png')}}" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i></a>
                    <div class="iq-sub-dropdown">
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-02.png')}}" alt="img-flaf" class="img-fluid mr-2" />French</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-03.png')}}" alt="img-flaf" class="img-fluid mr-2" />Spanish</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-04.png')}}" alt="img-flaf" class="img-fluid mr-2" />Italian</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-05.png')}}" alt="img-flaf" class="img-fluid mr-2" />German</a>
                        <a class="iq-sub-card" href="#"><img src="{{asset('assets/plugins/vito/images/small/flag-06.png')}}" alt="img-flaf" class="img-fluid mr-2" />Japanese</a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="search-toggle iq-waves-effect" href="#"><i class="ri-calendar-line"></i></a>
                    <div class="iq-sub-dropdown">
                        <div class="calender-small"></div>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a href="#" class="search-toggle iq-waves-effect">
                        <div id="lottie-beil"></div>
                        <span class="bg-danger dots"></span>
                        @if(get_notification()->count() > 9)
                        <span class="n-count">+9</span>
                        @else
                        <span class="n-count">{{get_notification()->count()}}</span>
                        @endif
                    </a>
                    <div class="iq-sub-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                                <h5 class="mb-0 text-white">التنبيهات<small class="badge  badge-light float-right pt-1">{{get_notification()->count()}}</small></h5>
                            </div>
                            @foreach(get_notification() as $item)
                            <a href="{{route('orders.show' , $item->order_id)}}" class="iq-sub-card" >
                                <div class="media align-items-center">
                                    <div class="">
                                        <img class="avatar-40 rounded" src="{{asset($item->user->image)}}" alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">{{$item->title}}</h6>
                                        <small class="float-right font-size-12">{{$item->created_at}}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
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
                    <img src="{{asset(auth()->user()->image)}}" class="img-fluid rounded mr-3" alt="user">
                    <div class="caption">
                        <h6 class="mb-0 line-height">{{auth()->user()->name}}</h6>
                    </div>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                    <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white line-height">{{auth()->user()->name}}</h5>
                            </div>
                            <a href="{{route('user.profile')}}" class="iq-sub-card iq-bg-primary-hover">
                                <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                        <i class="ri-file-user-line"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 "> الملف الشخصي</h6>
                                        <p class="mb-0">عرض تفاصيل الملف الشخصي.</p>
                                    </div>
                                </div>
                            </a>
                            <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn" onclick="document.getElementById('submit-form').submit()" href="#" role="button">
                                    تسجيل الجروخ
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
