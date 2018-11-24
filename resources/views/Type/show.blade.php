@extends('layout.admin')

@section('content')
    <div class="container">
        <p><h3>نمایش نوع باشگاه</h3></p>
    </div>
    <form action="#">
        <div class="container row" >

            <div class="col col-md-4" >

                <div class="form-group">
                    <label for="id">کد:</label>
                    <input type="text" name="id"  id="id" value="{{$type->id}}" class="form-control" readonly/>
                </div>
                <div class="form-group">
                    <label for="name">نام </label>
                    <input  type="text" id="name" name="name" value="{{$type->name}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="description">توضیح</label>
                    <textarea id="description" name="description"  class='form-control' rows="3" readonly>{{$type->description?$type->description : ""}}</textarea>
                </div>
                <div class="form-group">
                    <label for="created_at">تاریخ ایجاد </label>
                    <input  type="text" id="created_at" name="created_at" value="{{$type->created_at?$type->created_at : ""}}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="update_at">تاریخ بروزرسانی </label>
                    <input  type="text" id="update_at" name="update_at" value="{{$type->updated_at?$type->updated_at : ""}}" class='form-control' readonly>
                </div>


            </div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4" style="text-align: right;">
                <div class="form-group">
                <img height="200" width="100%" src="{{config('constant.type_avatar')}}/{{$type->photo? $type->photo->path :config('constant.noImageType')}}"  > </a>
                </div>
                <a href="{{$type->id}}/edit" style="color: #bd0d13;"><b>جهت ویرایش نوع باشگاه کلیک نمایید</b></a>

            </div>

        </div>
    </form>
@endsection