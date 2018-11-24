@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>نمایش باشگاه</h3></p>
    </div>
    <form action="#">
    <div class="container row" >

        <div class="col col-md-4" >

            <div class="form-group">
              <label for="id">کد:</label>
              <input type="text" name="id"  id="id" value="{{$event->id}}" class="form-control" readonly/>
            </div>
            <div class="form-group">
                <label for="name">نام باشگاه</label>
              <input  type="text" id="name" name="name" value="{{$event->name}}" class='form-control' readonly>
            </div>

            <div class="form-group">
                <label for="header">شعار باشگاه</label>
                <input type="text" id="header" name="header" value="{{$event->header}}" class='form-control' readonly>
            </div>
            <div class="form-group">
                <label for="state">استان</label>
                <input  type="text" id="state" name="name" value="{{$event->province?$event->province->name :""}}" class='form-control' readonly>
            </div>
            <div class="form-group">
                <label for="city">شهر</label>
                <input  type="text" id="city" name="city" value="{{$event->town ? $event->town->name : ""}}" class='form-control' readonly>
            </div>
            <div class="form-group">
                <label for="created_at">تاریخ ایجاد</label>
                <input type="text" id="created_at" name="created_at" value="{{$event->created_at}}" class='form-control' readonly>
            </div>

            <div class=form-group>
                <label for="updated_at">تاریخ بروزرسانی</label>
                <input type="text" id="updated_at" name="updated_at" value="{{$event->updated_at}}" class='form-control' readonly>
            </div>
            <div class="form-group">
                <label for="about">خصوصیات باشگاه</label>
                <textarea id="about" name="about" class="form-control" readonly>{{$event->about}} </textarea>
            </div>
            <div class="form-group">
                <label for="about_team">خصوصیات تیم</label>
                <textarea id="about_team" name="about"  class="form-control" readonly>{{$event->about_team}}</textarea>
            </div>

        </div>

        <div class="col col-md-4" >
            <div class=form-group>
                <label for="userName"> مدیر باشگاه</label>
                <input type="text" id="userName" name="userName" value="{{$event->tourManagers->first() ? $event->tourManagers->first()->name: ""}}" class='form-control' readonly>
            </div>
            <div class=form-group>
                <label for="userId"> کد مدیر باشگاه</label>
                <input type="text" id="userId" name="userId" value="{{$event->tourManagers->first() ? $event->tourManagers->first()->id: ""}}" class='form-control' readonly>
            </div>
            <div class=form-group>
                <label for="usersName">مدیران باشگاه</label>
                <textarea rows="2" id="usersName" name="usersName"  class='form-control' readonly>@foreach($event->tourManagers as $manager) {{$manager->name}}, @endforeach</textarea>
            </div>



        </div>

     <div class="col col-md-4">
         <a ><img height="200" width="100%" style="margin-bottom:20px" src="{{$event->avatar? config('constant.club_avatar').$avatar_path :config('constant.club_avatar').config('constant.noImageClub')}}"  > </a>
         <div >
             <a href="{{$event->id}}/edit" style="color: #bd0d13;"><b>جهت ویرایش باشگاه کلیک نمایید</b></a><hr>
         </div>
         <div >
             <a href="subscribes/{{$event->id}}" style="color: #bd0d13"><b> لیست مشترکین باشگاه </b></a>
         </div><br/>
         <div >
             <a href="posts/{{$event->id}}" style="color: #bd0d13"><b> لیست پست های باشگاه </b></a>
         </div><br/>
         <div >
             <a href="tickets/{{$event->id}}" style="color: #bd0d13"><b> لیست تیکت های باشگاه </b></a>
         </div>
     </div>

    </div>
    </form>
    @endsection