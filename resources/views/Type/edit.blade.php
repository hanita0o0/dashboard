@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>ویرایش نوع باشگاه</h3></p>
    </div>

    <div class="container row" >
        <div class="col col-md-4" >
            {!! Form::model($type,['method'=>'PATCH','action'=>['TypeController@update',$type->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','نام ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                {!! Form::hidden('id',$type->id,['class'=>'form-control']) !!}
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

                {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
            </div>

        </div>
        <div class="col col-md-4"></div>
        <div class="col col-md-4 " style="text-align: right;">
            <div class="form-group">
                <img height="200" width="100%" src="{{config('constant.type_avatar')}}/{{$type->photo? $type->photo->path :config('constant.noImageType')}}"  > </a>
                {!! Form::label('photo_id','عکس:') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>

        </div>
        {!! Form::close() !!}

    </div>

@endsection