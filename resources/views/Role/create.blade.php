@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>افزودن نقش</h3></p>
    </div>

    <div class="container row" >
        <div class="col col-md-4" >
            {!! Form::open(['method'=>'POST','action'=>'RoleController@store']) !!}
            <div class="form-group">
                {!! Form::label('name','نام ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('name') as $message)
                         {{$message}}
                @endforeach
                    </span>
                    @endif
            </div>
            <div class="form-group">
                {!! Form::label('description','توضیح') !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows'=>2]) !!}

            </div>

            <div class="form-group" >

                {!! Form::submit('افزودن',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        {{--<div class="col col-md-4"> @include('includes.form_error')</div>--}}

            {{--<div class="form-group">--}}

            {{--{!! Form::file('avatar_id',['style'=>'margin-top:50px']) !!}--}}
            {{--</div>--}}
        </div>



@endsection