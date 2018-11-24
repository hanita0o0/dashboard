@extends('layout.admin')

@section('content')
@if(Session::has('update_role'))
<div class="alert alert-danger">{{session('update_role')}}</div>
@endif
<button class="btn btn-info"><a href="roles/create">افزودن نقش</a></button><hr>

<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>کد</th>
        <th>نام</th>
        <th>توضیح</th>
        <th>تاریخ ایجاد</th>
        <th>تاریخ بروزرسانی</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$admin[0]->id}}</td>
        <td>{{$admin[0]->name}}</td>
        <td>{{$admin[0]->description? $admin[0]->description : ""}}</td>
        <td>{{$admin[0]->created_at?$admin[0]->created_at : ""}}</td>
        <td>{{$admin[0]->updated_at?$admin[0]->updated_at : ""}}</td>
        <td></td>
    </tr>
    @foreach($roles as $role)

    <tr >
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>{{$role->description? $role->description : ""}}</td>
        <td>{{$role->created_at?$role->created_at : ""}}</td>
        <td>{{$role->updated_at?$role->updated_at : ""}}</td>
        <td ><button class="btn btn-sm btn-success " ><a  href="roles/{{$role->id}}/edit">ویرایش</a></button>
            {!! Form::open(['method'=>'DELETE','action'=>['RoleController@destroy',$role->id],'style'=>"display: inline"]) !!}
            {!! Form::submit('حذف',['class'=>'btn-sm btn-danger','onclick'=>"return confirm('آیا مطمئن هستید؟؟؟؟')"]) !!}
            {!! Form::close() !!}</td>
    </tr>
    @endforeach

    </tbody>

</table>


@endsection