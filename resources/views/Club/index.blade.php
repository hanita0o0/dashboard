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
            <th>نام</th>
            <th>استان</th>
            <th>شهر</th>
            <th>مدیر</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        @for($i=0 ; $i<count($events); $i++)

            <tr>
                <td><a ><img height="50" width="50" src="{{$events[$i]['avatar_id'] ? config('constant.club_avatar').$events[$i]['avatar_path'] :config('constant.club_avatar').config('constant.noImageClub')}}"  > </a></td>
                <td>{{$events[$i]['id']}}</td>
                <td>{{$events[$i]['name']}}</td>
                <td>{{$events[$i]['state']}}</td>
                <td>{{$events[$i]['city']}}</td>
                <td>{{$events[$i]['tourManager']}}</td>
                <td>{{$events[$i]['created_at']}}</td>
                <td>{{$events[$i]['updated_at']}}</td>
                {{--<td>{{$event->subscribers?$event->subscribers->name: null}}</td>--}}
                <td><button class="btn btn-sm btn-success "><a href="{{Route('clubs.edit',$events[$i]['id'])}}">ویرایش</a></button>
                    <button class="btn btn-sm btn-info "><a href="clubs/{{$events[$i]['id']}}">مشاهده</a></button>
                    {{--{!! Form::open(['method'=>'DELETE','action'=>['ClubController@destroy',$event->id,'style'=>"display: inline"]]) !!}--}}
                    {{--{!! Form::submit('حذف',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}--}}
                    {{--{!! Form::close() !!}</td>--}}
                </td>
            </tr>
        @endfor

        </tbody>

    </table>
    @endsection