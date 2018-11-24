@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>ویرایش نقش</h3></p>
    </div>

    <div class="container row" >
        <div class="col col-md-4" >
            {!! Form::model($role,['method'=>'PATCH','action'=>['RoleController@update',$role->id]]) !!}
            <div class="form-group">
                {!! Form::label('name','نام ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                {!! Form::hidden('id',$role->id,['class'=>'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('description','توضیح ') !!}
                {!! Form::text('description',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" >

                {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>

            {{-- @include('includes.form_error')--}}
            {{--<div class="form-group">--}}

            {{--{!! Form::file('avatar_id',['style'=>'margin-top:50px']) !!}--}}
            {{--</div>--}}

    </div>
@endsection