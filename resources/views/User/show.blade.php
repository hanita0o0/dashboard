@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>نمایش کاربر</h3></p>
    </div>
    <form action="#">
        <div class="container row" >

            <div class="col col-md-4" >

                <div class="form-group">
                    <label for="id">کد:</label>
                    <input type="text" name="id"  id="id" value="{{$user->id}}" class="form-control" readonly/>
                </div>
                <div class="form-group">
                    <label for="name">نام </label>
                    <input  type="text" id="name" name="name" value="{{$user->name_header?$user->name_header : ""}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="name_header">نام کاربری</label>
                    <input type="text" id="name_header" name="name_header" value="{{$user->name}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input  type="text" id="email" name="email" value="{{$user->email}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="state_id">استان</label>
                    <input  type="text" id="state_id" name="state_id" value="{{$user->state?$user->state->name :""}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="city_id">شهر</label>
                    <input  type="text" id="city_id" name="city_id" value="{{$user->city ? $user->city->name : ""}}" class='form-control' readonly>
                </div>
                <div class=form-group>
                    <label for="address">آدرس</label>
                    <textarea id="address" name="address"  class='form-control' readonly>{{$user->address ? $user->address : ""}}</textarea>
                </div>
                <div class=form-group>
                    <label for="phone"> تلفن</label>
                    <input type="text" id="phone" name="phone" value="{{$user->phone ? $user->phone :""}}" class='form-control' readonly>
                </div>
            </div>

            <div class="col col-md-4" >
                <div class="form-group">
                    <label for="gender">جنس</label>
                    <input type="text" id="gender" name="gender" value="{{$user->gender==1? " مرد" :"زن"}}" class='form-control' readonly>
                </div>
                <div class=form-group>
                    <label for="created_at">تاریخ ایجاد</label>
                    <input type="text" id="created_at" name="created_at" value="{{$user->created_at?$user->created_at :""}}" class='form-control' readonly>
                </div>

                <div class=form-group>
                    <label for="updated_at">تاریخ بروزرسانی</label>
                    <input type="text" id="updated_at" name="updated_at" value="{{$user->updated_at?$user->updated_at : ""}}" class='form-control' readonly>
                </div>

                <div class="form-group">
                    <label for="bio">بیوگرافی</label>
                    <textarea id="bio" name="bio" class="form-control" readonly>{{$user->bio?$user->bio : ""}} </textarea>
                </div>
                <div class=form-group>
                    <label for="updated_at">نقش</label>
                    <textarea rows="2" id="role_id" name="role_id"  class='form-control' readonly>@foreach($user->roles as $role) {{$role->name}}, @endforeach</textarea>
                </div>

            </div>

            <div class="col col-md-4" style="text-align: right;">
                <img height="200" width="100%" style="float: left;margin-bottom: 20px" src="{{config('constant.user_avatar')}}/{{$user->avatar? $user->avatar->path :config('constant.noImageUser')}}" alt="" class="img-responsive img-rounded"  >

                    <a href="{{$user->id}}/edit" style="color: #bd0d13;"><b>جهت ویرایش کاربر کلیک نمایید</b></a>

            </div>

    </div>
    </form>
@endsection