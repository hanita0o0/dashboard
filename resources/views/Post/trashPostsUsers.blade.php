@extends('layout.admin')

@section('content')
{{--@if(Session::has('update_user'))--}}
{{--<div class="alert alert-danger">{{session('update_user')}}</div>--}}
{{--@endif--}}

<button style="display: inline;" class="btn btn-info"><a href="{{Route('postsUsersDel')}}">حذف همه برای همیشه</a></button>
<button class="btn btn-info"><a href="{{route('PostsUsersRestore')}}">بازیابی همه </a></button><hr>

<table id="example" class="display " >
    <thead>
    <tr >
        <th>عکس</th>
        <th>کد</th>
        <th>ایجاد کننده</th>
        {{--<th> نام باشگاه</th>--}}
        <th>تاریخ ایجاد</th>
        <th>تاریخ بروزرسانی</th>
        <th>محتوا</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody style=" overflow: hidden;text-overflow: ellipsis;">

    @for($i=0 ; $i<count($posts); $i++)

        <tr>
            <td><a ><img height="50" width="50" src="{{$posts[$i]['media_id'] ? config('constant.post_avatar').$posts[$i]['media_path'] :config('constant.post_avatar').config('constant.noImagePost')}}"> </a></td>
            <td>{{$posts[$i]['id']}}</td>
            <td>{{$posts[$i]['username']}}</td>
            <td>{{$posts[$i]['created_at']? $posts[$i]['created_at'] : ""}}</td>
            <td>{{$posts[$i]['updated_at'] ? $posts[$i]['updated_at'] : ""}}</td>
            <td >{{$posts[$i]['body'] ? $posts[$i]['body'] : ""}}</td>
            <td>
            <button  class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟؟؟؟')"><a href="{{route('postUserDel',$posts[$i]['id'])}}">حذف برای همیشه </a></button>
            <button  class="btn btn-danger"><a href="{{Route('PostUserRestore',$posts[$i]['id'])}}">بازیابی</a></button>
    </tr>
    @endfor
    </tbody>

</table>


@endsection