@extends('layout.admin')
@section('content')
<div class="row">
 <div class="col-lg-2">
    <div class="card">
        <div class="stat-widget-two">
            <div class="stat-content">
                <div class="stat-text">  کاربران</div>
                <div class="stat-digit"> {{$users[0]->numuser}}</div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
    <div class="col-lg-2">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <div class="stat-text"> کاربرجدید</div>
                    <div class="stat-digit"> {{$userNew[0]->numnewuser}}</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
<div class="col-lg-2">
    <div class="card">
        <div class="stat-widget-two">
            <div class="stat-content">
                <div class="stat-text">تعداد باشگاه ها</div>
                <div class="stat-digit">{{$clubs[0]->numclub}}<i class="fas fa-club"></i></div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2">
    <div class="card">
        <div class="stat-widget-two">
            <div class="stat-content">
                <div class="stat-text"> پست کاربران</div>
                <div class="stat-digit"> {{$postUser[0]->numpostuser}}</div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2">
    <div class="card">
        <div class="stat-widget-two">
            <div class="stat-content">
                <div class="stat-text">پست باشگاه ها</div>
                <div class="stat-digit"> {{$postEvent[0]->numpostevent}}</div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <!-- /# card -->
</div>
    <div class="col-lg-2">
        <div class="card">
            <div class="stat-widget-two">
                <div class="stat-content">
                    <div class="stat-text">پیام جدید</div>
                    <div class="stat-digit"> </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
<!-- /# column -->
</div>
<!-- /# row -->


<div class="row">
    <!-- column -->
    {{--<div class="col-lg-8">--}}
        {{--<div class="card">--}}
            {{--<div class="card-body">--}}
                {{--<h4 class="card-title">Sales Overview</h4>--}}
                {{--<div id="morris-bar-chart"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- column -->--}}
    {{--<div class="col-md-4">--}}
        {{--<div class="card text-center">--}}
            {{--<div class="m-t-10">--}}
                {{--<p>Customer Feedback</p>--}}
                {{--<h5>385749</h5>--}}
            {{--</div>--}}
            {{--<div class="widget-card-circle pr m-t-20 m-b-20" id="info-circle-card">--}}
                {{--<i class="ti-control-shuffle pa"></i>--}}
            {{--</div>--}}
            {{--<ul class="widget-line-list m-b-15">--}}
                {{--<li class="border-right">92% <br><span class="color-success"><i class="ti-hand-point-up"></i> Positive</span></li>--}}
                {{--<li>8% <br><span class="color-danger"><i class="ti-hand-point-down"></i>Negative</span></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>

<div class="row">
    <div class="col-lg-12 ">
        <div class="card" style="height: 500px;overflow-y: auto">
            <div class="card-title">
                <h4>مشترکین باشگاه ها</h4>
            </div>
            <div class="card-body">
                <div class="current-progress">
                    <div class="progress-content">
                        @for($i=0; $i<count($subscribe);$i++)
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="progress-text">{{$subscribe[$i]->name}}</div>
                            </div>
                            <div class="col-lg-8">
                                <div class="current-progressbar">
                                    <div class="progress">
                                      <span style="display:none">{{$x=$subscribe[$i]->subs}}</span>
                                        <div class="progress-bar progress-bar-primary w-{{$x*100/$totalSubs }} " role="progressbar"  aria-valuenow="{{$x*100/$totalSubs }}" aria-valuemin="0" aria-valuemax="100">
                                            {{$subscribe[$i]->subs}} نفر
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    {{--<div class="col-lg-4">--}}
        {{--<div class="card bg-primary">--}}
            {{--<div class="weather-widget">--}}
                {{--<div id="weather-one" class="weather-one p-22"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-4">--}}
        {{--<div class="card">--}}
            {{--<div class="testimonial-widget-one p-17">--}}
                {{--<div class="testimonial-widget-one owl-carousel owl-theme">--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<div class="testimonial-content">--}}
                            {{--<div class="testimonial-text">--}}
                                {{--<i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                                {{--exercitation. consectetur adipisicing elit.--}}
                                {{--<i class="fa fa-quote-right"></i>--}}
                            {{--</div>--}}
                            {{--<img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />--}}
                            {{--<div class="testimonial-author">TYRION LANNISTER</div>--}}
                            {{--<div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="card nestable-cart">
            <div class="card-title">
                <h4>USA</h4>
                <div class="card-title-right-icon">
                    <ul>

                    </ul>
                </div>
            </div>
            <div class="Vector-map-js">
                <div id="vmap13" class="vmap"></div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>New Orders </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>Lew Shawon</td>
                            <td><span>Dell-985</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-success">Done</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>Lew Shawon</td>
                            <td><span>Asus-565</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>lew Shawon</td>
                            <td><span>Dell-985</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-success">Done</span></td>
                        </tr>

                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>Lew Shawon</td>
                            <td><span>Asus-565</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>lew Shawon</td>
                            <td><span>Dell-985</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-success">Done</span></td>
                        </tr>

                        <tr>
                            <td>
                                <div class="round-img">
                                    <a href=""><img class="w-35" src="assets/images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td>Lew Shawon</td>
                            <td><span>Asus-565</span></td>
                            <td><span>456 pcs</span></td>
                            <td><span class="badge badge-warning">Pending</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Task</h4>
            </div>
            <div class="todo-list">
                <div class="tdl-holder">
                    <div class="tdl-content">
                        <ul>
                            <li>
                                <label>
                                    <input type="checkbox"><i></i><span>Post three to six times on Twitter.</span>
                                    <a href='#' class="ti-close"></a>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" checked><i></i><span>Post one to two times on Facebook.</span>
                                    <a href='#' class="ti-close"></a>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" checked><i></i><span>Follow back those who follow you</span>
                                    <a href='#' class="ti-close"></a>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" checked><i></i><span>Connect with one new person</span>
                                    <a href='#' class="ti-close"></a>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card alert">
            <div class="card-title">
                <h4>Web Server</h4>
            </div>
            <div class="cpu-load-chart">
                <div id="cpu-load" class="cpu-load"></div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Ticket </h4>

            </div>
            <div class="recent-comment">
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="assets/images/avatar/1.jpg" alt="..."></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">john doe</h4>
                        <p>Cras sit amet nibh libero, in gravida nulla. </p>
                        <div class="comment-action">
                            <div class="badge badge-success">Done</div>
                            <span class="m-l-10">
													<a href="#"><i class="ti-check color-success"></i></a>
													<a href="#"><i class="ti-close color-danger"></i></a>
													<a href="#"><i class="fa fa-reply color-primary"></i></a>
												</span>
                        </div>
                        <p class="comment-date">October 21, 2017</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="assets/images/avatar/2.jpg" alt="..."></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Mr. John</h4>
                        <p>Cras sit amet nibh libero, in gravida nulla. </p>
                        <div class="comment-action">
                            <div class="badge badge-warning">Pending</div>
                            <span class="m-l-10">
													<a href="#"><i class="ti-check color-success"></i></a>
													<a href="#"><i class="ti-close color-danger"></i></a>
													<a href="#"><i class="fa fa-reply color-primary"></i></a>
												</span>
                        </div>
                        <p class="comment-date">October 21, 2017</p>
                    </div>
                </div>
                <div class="media no-border">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="assets/images/avatar/3.jpg" alt="..."></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Mr. John</h4>
                        <p>Cras sit amet nibh libero, in gravida nulla. </p>
                        <div class="comment-action">
                            <div class="badge badge-success">Done</div>
                            <span class="m-l-10">
													<a href="#"><i class="ti-check color-success"></i></a>
													<a href="#"><i class="ti-close color-danger"></i></a>
													<a href="#"><i class="fa fa-reply color-primary"></i></a>
												</span>
                        </div>
                        <div class="comment-date">October 21, 2017</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
</div>
    @endsection