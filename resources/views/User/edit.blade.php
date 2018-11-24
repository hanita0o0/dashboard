@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>ویرایش کاربر</h3></p>
    </div>

    <div class="container row" >
        <div class="col col-md-4" >
            {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name_header','نام') !!}
                {!! Form::text('name_header',null,['class'=>'form-control']) !!}
                @if($errors->has('name_header'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('name_header') as $message)
                            {{$message}}
                        @endforeach
                    </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('name','نام کاربری') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                {!! Form::hidden('id',$user->id,['class'=>'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('email','ایمیل') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
                @if($errors->has('email'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('email') as $message)
                            {{$message}}
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('role[]','نقش') !!}
                <select name="role[]" multiple="multiple" class="form-control">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" @foreach($user->roles as $rol ) @if($rol->id == $role->id) selected @endif @endforeach>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" >

                {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
            </div>


        </div>

        <div class="col col-md-4" >
            <div class="form-group">
                {!! Form::label('state_id','استان') !!}

                {{--                {!! Form::select('state_id',[$user->state?$user->state->name : ""]+$state,null,['class'=>'form-control']) !!}--}}
                {!! Form::select('state_id',[$user->state->id=>$user->state->name]+$state,null,['class'=>'form-control','onchange'=>'state(this.value);']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city_id','شهر') !!}

                {{--<select class="form-control" name="city_id" id="stateList" onclick="stateList()">--}}
                {{--@foreach($city as $cit)--}}
                {{--<option value="{{$cit->id}}">{{$cit->name}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {!! Form::select('city_id',[$user->city->id=>$user->city->name]+$city,null,['class'=>'form-control']) !!}
                {{--{!! Form::select('city_id',@foreach ($city as $cit) @endforeach ,null,['class'=>'form-control']) !!}--}}
            </div>
            <div class="form-group">
                {!! Form::label('phone','تلفن') !!}
                {!! Form::text('phone',null,['class'=>'form-control']) !!}
                @if($errors->has('phone'))
                    <span class="help-block" style="color:red"> @foreach ($errors->get('phone') as $message)
                            {{$message}}
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('bio','بیوگرافی') !!}
                {!! Form::textarea('bio',null,['class'=>'form-control', 'rows' => 4]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('gender','جنس') !!}
                {!! Form::select('gender',['1'=>'مرد','2'=>'زن'],null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address','آدرس') !!}
                {!! Form::textarea('address',null,['class'=>'form-control','rows'=>4]) !!}
            </div>
        </div>

        <div class="col col-md-4" >
            <img style='margin-bottom:10px' width="100%" height="250" src="{{config('constant.user_avatar')}}/{{$user->avatar? $user->avatar->path :config('constant.noImageUser')}}" alt="" class="img-responsive img-rounded">
            <div class="form-group">
                {!! Form::label('avatar_id','عکس:') !!}
                {!! Form::file('avatar_id',['class'=>'form-control']) !!}
            </div>
        </div>
        </div>

        {!! Form::close() !!}
        <script>
            function state(str) {

                // var xhttp = new XMLHttpRequest();
                // xhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //      console.log("hello");
                //     }
                // };
                // xhttp.open("GET", '/salam', true);
                //
                // xhttp.send();

                // return x;
            }


        </script>
    </div>

@endsection