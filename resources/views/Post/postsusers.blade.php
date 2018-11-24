@extends('layout.admin')

@section('content')
    {{--@if(Session::has('update_user'))--}}
        {{--<div class="alert alert-danger">{{session('update_user')}}</div>--}}
    {{--@endif--}}
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>عکس</th>
            <th>کد</th>
            <th>ایجاد کننده</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th style="width: 300px">محتوا</th>
            <th style="width: 200px">عملیات</th>
        </tr>
        </thead>
        <tbody>

        @for($i=0 ; $i<count($posts); $i++)

            <tr>
                <td><a ><img height="50" width="50" src="{{$posts[$i]['media_id'] ? config('constant.post_avatar').$posts[$i]['media_path'] :config('constant.post_avatar').config('constant.noImagePost')}}"> </a></td>
                <td>{{$posts[$i]['id']}}</td>
                <td>{{$posts[$i]['username']}}</td>
                <td>{{$posts[$i]['created_at']? $posts[$i]['created_at'] : ""}}</td>
                <td>{{$posts[$i]['updated_at'] ? $posts[$i]['updated_at'] : ""}}</td>
                <td >{{$posts[$i]['body'] ? $posts[$i]['body'] : ""}}</td>
                <td>
                    <button  class="btn btn-sm btn-info "><a href="/posts/users/show/{{$posts[$i]['id']}}">مشاهده</a></button>
                    {!! Form::open(['method'=>'DELETE','action'=>['PostController@delPostUser',$posts[$i]['id']],'style'=>'display:inline-block']) !!}
                    {!! Form::submit('حذف وارسال ایمیل',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}
                    {!! Form::close() !!}</td>
            </tr>
        @endfor

        </tbody>

    </table>

@endsection