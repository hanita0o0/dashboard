@extends('layout.admin')

@section('content')
    @if(Session::has('update_user'))
        <div class="alert alert-danger">{{session('update_user')}}</div>
    @endif
        @if(Session::has('set_password'))
            <div class="alert alert-danger">{{session('set_password')}}</div>
    @endif
    <table id="example" class="display"  >
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
            <th style="width: 200px">عملیات</th>
        </tr>
        </thead>
        <tbody >

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
             <td ><button class="btn btn-sm btn-success "><a href="users/{{$user->id}}/edit">ویرایش</a></button>
                    <button  class="btn btn-sm btn-info "><a href="users/{{$user->id}}">مشاهده</a></button>
                   {{--{!! Form::open(['method'=>'DELETE','action'=>['UserController@destroy',$user->id],'style'=>'display:inline-block']) !!}--}}
                   {{--{!! Form::submit('حذف',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}--}}
                   {{--{!! Form::close() !!}--}}
                 <button  class="btn btn-sm btn-danger "><a href="users/pass/{{$user->id}}">تغیررمز</a></button>
             </td>
            </tr>
        @endforeach

        </tbody>

    </table>


@endsection