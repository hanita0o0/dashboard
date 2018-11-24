@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="col col-md-4">
            <div class="form-group">
    {!! Form::model(['method'=>'post','action'=>['UserController@setPass',$user->id]]) !!}
    {!! Form::label('password','رمز جدید ') !!}
    {!! Form::text('password',null,['class'=>'form-control']) !!}
            @if($errors->has('password'))
                <span class="help-block" style="color:red"> @foreach ($errors->get('password') as $message)
                        {{$message}}
                    @endforeach
                    </span>
            @endif
            </div>
            <div class="form-group">
    {!! Form::label('password_confirmation','تکرار رمز جدید') !!}
    {!! Form::text('password_confirmation',null,['class'=>'form-control']) !!}
            @if($errors->has('password_confirmation'))
                <span class="help-block" style="color:red"> @foreach ($errors->get('password_confirmation') as $message)
                        {{$message}}
                    @endforeach
                    </span>
            @endif
            </div>
            <div class="form-group">
                {!! Form::submit('ارسال',['class'=>'btn btn-info']) !!}

            </div>
    {!! Form::close() !!}
    </div>
    </div>
    @endsection