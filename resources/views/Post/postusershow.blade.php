@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>نمایش پست کاربر</h3></p>
    </div>
    <form action="#">
        <div class="container row" >

            <div class="col col-md-4" >

                <div class="form-group">
                    <label for="id">کد:</label>
                    <input type="text" name="id"  id="id" value="{{$post->id}}" class="form-control" readonly/>
                </div>
                <div class="form-group">
                    <label for="user_id">نام ایچاد کننده </label>
                    <input  type="text" id="user_id" name="user_id" value="{{$post->user?$post->user->name :""}}" class='form-control' readonly>
                </div>

                <div class=form-group>
                    <label for="created_at">تاریخ ایجاد</label>
                    <input type="text" id="created_at" name="created_at" value="{{$post->created_at?$post->created_at :""}}" class='form-control' readonly>
                </div>

                <div class=form-group>
                    <label for="updated_at">تاریخ بروزرسانی</label>
                    <input type="text" id="updated_at" name="updated_at" value="{{$post->updated_at?$post->updated_at : ""}}" class='form-control' readonly>
                </div>

                </div>
            <div class="col col-md-4">
                   <div  class="form-group">
                    <label for="bio">محتوا</label>
                    <textarea id="body" name="body" class="form-control" readonly>{{$post->body?$post->body : ""}} </textarea>
                   </div>
                </div>

                <div class="col col-md-4" style="text-align: right;">
                <img height="200" width="100%" style="float: left;margin-bottom: 20px" src="{{$post->media_id ? config('constant.post_avatar').$media_path :config('constant.post_avatar').config('constant.noImagePost')}}" alt="" class="img-responsive img-rounded"  >
                </div>

               </div>


    </form>
@endsection