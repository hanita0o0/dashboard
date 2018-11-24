@extends('layout.admin')

@section('content')

    <table id="example" class="display" style="width:100%">
        <b style="color:#0D47A1;font-size: large;margin-right:40%;">لیست پست های باشگاه</b><hr>
        <thead>
        <tr>
            <th>عکس</th>
            <th>کد</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th >محتوا</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        @for($i=0 ; $i<count($posts); $i++)

            <tr>
                <td><a ><img height="50" width="50" src="{{$posts[$i]['media_id'] ? config('constant.post_avatar').$posts[$i]['media_path'] :config('constant.post_avatar').config('constant.noImagePost')}}"> </a></td>
                <td>{{$posts[$i]['id']}}</td>
                <td>{{$posts[$i]['created_at']}}</td>
                <td>{{$posts[$i]['updated_at']}}</td>
                <td >{{$posts[$i]['body']}}</td>
                <td> <button class="btn btn-sm btn-info "><a href="{{route('postClub',$posts[$i]['id'])}}">مشاهده</a></button>
                    {!! Form::open(['method'=>'DELETE','action'=>['PostController@delPostClub',$posts[$i]['id']],'style'=>'display: inline-block']) !!}
                    {!! Form::submit('حذف',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}
                    {!! Form::close() !!}</td>
                </td>
            </tr>
        @endfor

        </tbody>

    </table>

@endsection