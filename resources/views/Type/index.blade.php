@extends('layout.admin')

@section('content')
    @if(Session::has('update_type'))
        <div class="alert alert-danger">{{session('update_type')}}</div>
    @endif
    <table id="example" class="display" >
        <thead>
        <tr>
            <th>عکس</th>
            <th>کد</th>
            <th>نام</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        @foreach($types as $type)

            <tr>
                <td><a ><img height="50" width="50" src="{{config('constant.type_avatar')}}/{{$type->photo? $type->photo->path :config('constant.noImageType')}}"  > </a></td>
                <td>{{$type->id}}</td>
                <td>{{$type->name }}</td>
                <td>{{$type->created_at}}</td>
                <td>{{$type->updated_at}}</td>
                {{--<td>{{$event->subscribers?$event->subscribers->name: null}}</td>--}}
                <td><button class="btn btn-sm btn-success "><a href="{{Route('types.edit',$type->id)}}">ویرایش</a></button>
                    <button class="btn btn-sm btn-info "><a href="types/{{$type->id}}">مشاهده</a></button>
                    {!! Form::open(['method'=>'DELETE','action'=>['TypeController@destroy',$type->id],'style'=>"display: inline"]) !!}
                    {!! Form::submit('حذف',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}
                    {!! Form::close() !!}</td>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection