<div  class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>

                                <li class="header-icon dib"><i class="ti-bell"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">تیکت های اخیر </span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">زمان</small>
                                                    <div class="notification-heading">نام باشگاه</div>

                                                </div>
                                            </a>
                                                </li>


                                                <li class="text-center">
                                                    <a href="#" class="more-link">مشاهده تمام تیکت ها</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><i class="ti-email"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">2 پیام جدید</span>
                                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">زمان</small>
                                                    <div class="notification-heading">نام کاربر</div>
                                                    <div class="notification-text">عنوان پیام</div>
                                                </div>
                                            </a>
                                                </li>


                                                <li class="text-center">
                                                    <a href="#" class="more-link">مشاهده تمام پیام ها</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><span class="nav-item dropdown caret"> @if( Auth::check())
                                            {{ Auth::user()->name}}
                                        @endif
                                        <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        {{--<div class="dropdown-content-heading">--}}
                                            {{--<span class="text-left">بروزرسانی</span>--}}
                                            {{--<p class="trial-day">30 Days Trail</p>--}}
                                        {{--</div>--}}
                                        <div class="dropdown-content-body" style="background-color: #5dc2f1">
                                            <ul>
                                                <li><a href="#"><i class="dropdown-item"></i> پروفایل</a></li>

                                                <li><a href="#"><i class="dropdown-item"></i>پوشه من</a></li>
                                                <li><a href="#"><i class="dropdown-item"></i> تنظیمات</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" style="color:darkred"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('خروج') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>