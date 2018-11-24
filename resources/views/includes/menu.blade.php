<div  style="min-height: 800px;" class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div  class="nano">
                <div  class="nano-content" style="padding-right: 20px">
                    <div class="logo"><a href="/admin"> <img src="<?=asset('assets/images/logo2.png');?>" alt="" /> <span> مدیریت</span></a></div>
                    <ul>
                        <li ><a class="sidebar-sub-toggle" ><i class="fas fa-users" ></i> کاربران <span  style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                {{--<li><a href="table-basic.html">افزودن کد</a></li>--}}

                                <li><a  href="/users"><i class="fas fa-user-edit" ></i>لیست کاربران</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> باشگاه ها <span  style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                {{--<li><a href="table-basic.html">افزودن کد</a></li>--}}

                                <li><a href="/clubs"><i class="fas fa-user-edit" ></i>لیست باشگاه ها</a></li>
                                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i>انواع باشگاه <span  style="float: left " class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li><a  href="/types"><i class="fas fa-user-edit" ></i> لیست انواع باشگاه </a></li>
                                <li><a  href="/types/create"><i class="fas fa-user-edit" ></i> افزودن نوع باشگاه </a></li>
                                </ul>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> پست ها <span  style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>

                                <li><a href="/posts/users"> <i class="fas fa-user-edit" ></i>  پست کاربران</a></li>
                                <li><a href="/posts/clubs"> <i class="fas fa-user-edit" ></i>  پست باشگاه ها</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> نقش ها<span  style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>

                                <li><a href="/roles"> <i class="fas fa-user-edit" ></i> لیست نقش ها</a></li>
                                <li><a href="/roles/create"> <i class="fas fa-user-edit" ></i> افزودن نقش </a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="fas fa-comments"></i> پیام ها <span style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="gmaps.html"> ارسال پیام</a></li>
                                <li><a href="gmaps.html">مدیریت پیام ها</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="fas fa-trash"></i> سطل آشغال <span style="float: left" class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="trash/users"> کاربران</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{route('postsUsersTrash')}}"> پست کاربران</a></li>
                                <li><a href="{{route('postsClubsTrash')}}"> پست باشگاه ها</a></li>
                            </ul>
                        </li>
                        <li><a><i class="ti-close"></i> خروج</a></li>
                    </ul>
                </div>
            </div>
        </div>