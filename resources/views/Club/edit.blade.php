@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>ویرایش باشگاه</h3></p>
    </div>

    <div class="container row" >
        <div class="col col-md-4" >
          {!! Form::model($event,['method'=>'PATCH','action'=>['ClubController@update',$event->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','نام باشگاه') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            @if($errors->has('name'))
                <span class="help-block" style="color:red"> @foreach ($errors->get('name') as $message)
                        {{$message}}
                    @endforeach
                    </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('header','شعار باشگاه') !!}
            {!! Form::text('header',null,['class'=>'form-control']) !!}
        </div>
            <div class="form-group">
                {!! Form::label('state','استان') !!}
                {!! Form::select('state',[$event->province->id=>$event->province->name]+$state,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city','شهر') !!}
                {!! Form::select('city',[$event->town->id=>$event->town->name]+$city,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group" >

                {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
            </div>
            </div>

                <div class="col col-md-4" >
                    <div class="form-group">
                        {!! Form::label('about','خصوصیات باشگاه') !!}
                        {!! Form::textarea('about',null,['class'=>'form-control','rows'=>3]) !!}
                    </div>
            <div class="form-group">
                {!! Form::label('about_team','خصوصیات تیم') !!}
                {!! Form::textarea('about_team',null,['class'=>'form-control','rows'=>3]) !!}
            </div>

                    <div class="form-group">
                        {!! Form::label('manager','مدیران') !!}
                        <select id="manager" class="form-control" multiple="multiple" name="manager[]">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"  @foreach($event->tourManagers as $manager) @if($manager->id==$user->id)
                                selected @endif @endforeach>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('manager'))
                            <span class="help-block" style="color:red"> @foreach ($errors->get('manager') as $message)
                                    {{$message}}
                                @endforeach
                    </span>
                        @endif
                    </div>

        </div>

            <div class="col col-md-4" style="text-align: right;">
            <img height="250" width="100%" src="{{$event->avatar? config('constant.club_avatar').$avatar_path :config('constant.club_avatar').config('constant.noImageClub')}}" alt="" class="img-responsive img-rounded">
                <div class="form-group">
                    {!! Form::label('avatar','عکس:') !!}
                    {!! Form::file('avatar',['class'=>'form-control']) !!}
                </div>

           </div>

        {!! Form::close() !!}
    </div>
    @endsection