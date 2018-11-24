@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ثبت نام') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_header" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                            <div class="col-md-6">
                                <input id="name_header" type="text" class="form-control{{ $errors->has('name_header') ? ' is-invalid' : '' }}" name="name_header" value="{{ old('name_header') }}" required>

                                @if ($errors->has('name_header'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_header') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' تکرار رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('استان') }}</label>

                            <div class="col-md-6">
                                <select id="state_id"  class="form-control" name="state_id"  required>
                               @foreach($state as $st)
                                   <option value="{{$st->id}}">{{$st->name}}</option>
                                   @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city_id" class="col-md-4 col-form-label text-md-right">{{ __('شهر') }}</label>

                            <div class="col-md-6">
                                <select id="city_id"  class="form-control" name="city_id"  required>
                                    @foreach($city as $cit)
                                        <option value="{{$cit->id}}">{{$cit->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('جنس') }}</label>
                            <div class="col-md-3" style="text-align: right">
                            <input type="radio" name="gender" value="1"> مرد
                                <input type="radio" name="gender" value="2"> زن
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>


                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                            </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>
                           <div class="col-md-6">
                            <input  type="file" id="avatar_id"  class="form-control" name="avatar_id"  />

                           </div>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="avatar_id" class="col-md-4 col-form-label text-md-right">{{ __('عکس') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="avatar_id" type="text" class="form-control{{ $errors->has('name_header') ? ' is-invalid' : '' }}" name="name_header" value="{{ old('name_header') }}" required>--}}

                                {{--@if ($errors->has('name_header'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('name_header') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="float: left">
                                    {{ __('ثبت') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
