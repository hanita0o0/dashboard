@extends('layout.admin')

@section('content')
@if(Session::has('update_user'))
<div class="alert alert-danger">{{session('update_user')}}</div>
@endif

<button style="display: inline;" class="btn btn-info"><a href="/trash/users/all">حذف همه برای همیشه</a></button>
<button class="btn btn-info"><a href="/restore/users/all">بازیابی همه </a></button><hr>

<table id="example" class="display " >
    <thead>
    <tr >
        <th>عکس</th>
        <th>کد</th>
        <th>نام کاربری</th>
        <th>ایمیل</th>
        <th>استان</th>
        <th>شهر</th>
        <th>تلفن</th>
        <th>نقش</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody style=" overflow: hidden;text-overflow: ellipsis;">

    @foreach($users as $user)

    <tr >
        <td><a ><img height="50" width="50" src="{{config('constant.user_avatar')}}/{{$user->avatar? $user->avatar->path :config('constant.noImageUser')}}"  > </a></td>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->state ? $user->state->name : "not assign"}}</td>
        <td>{{$user->city ? $user->city->name : "not assign"}}</td>
        <td >{{$user->phone}}
        <td >@foreach($user->roles as $role) {{$role->name}} , @endforeach</td>
        <td>
            <button  class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟؟؟؟')"><a href="/trash/user/{{$user->id}}">حذف برای همیشه</a></button>
            <button  class="btn btn-danger"><a href="/restore/user/{{$user->id}}">بازیابی</a></button>
    </tr>
    @endforeach
    </tbody>

</table>


@endsection