<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use App\User;
use App\State;
use App\City;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\PasswordRequest;
use Image;
class UserController extends Controller
{
    //

    public function index(){
       $users=User::all();
        return view('User.index',compact('users'));
    }

    public function show($id){
        $user=User::findOrFail($id);

        return view('User.show',compact('user'));
    }



    public function edit($id){
//        Province::class = $object;
        $user=User::findOrFail($id);
        if($user->state_id){
            $stId=$user->state_id;
        }
        if($user->city_id){
            $ctId=$user->city_id;
        }
       // $states = State::all();
       // $cities = City::all();
        $roles=Role::all();
       $state=State::pluck('name','id')->except('id',$stId)->all();
       $city=City::pluck('name','id')->except('id',$ctId)->all();
//        $city= DB::table ('cities')->select('select name , id ')->get();
//       return $city;
//       $city=City::where('state_id','2')->pluck('name','id')->all();

      return view('User.edit',compact(['user','state','city','roles']));
    }
    public function update(EditUserRequest $request, $id)
    {
        $user=User::find($id);
        $input=$request->all();
       // $file=$request->file('avatar_id');
        if ($request->hasFile('avatar_id')) {
          $input['avatar_id']= $this->updateAvatar($request, $user->id);
        }
//        if($file){
//            $file_name = time() . '.' . $file->getClientOriginalName();
//            $path_original = config('constant.path_user_avatar1'). $file_name;
//            $path_thumbnail = config('constant.path_user_avatar2'). $file_name;
//            $path_medium = config('constant.path_user_avatar3'). $file_name;
//            $path_large =  config('constant.path_user_avatar4'). $file_name;
//            Image::make($file)->fit(150, 150)->save($path_thumbnail);
//            Image::make($file)->fit(500, 500)->save($path_medium);
//            Image::make($file)->fit(900, 900)->save($path_large);
//            Image::make($file)->save($path_original);
//            $photo=new Photo();
//            $photo->path=$name;
//            $photo->save();
//            $input['avatar_id']=$photo->id;
//        }


        $user->update($input);
        $user->roles()->sync($request->input('role'));
        session::flash('update_user','کاربر آپدیت شد');
        return redirect('users');
    }
        public function updateAvatar($request, $user_id)
    {

        $user = User::findOrFail($user_id);

        if ($id = $user->avatar_id) {
            $photo = Photo::find($id);
            $file_name = $photo->path;
            $path_original = config('constant.path_user_avatar1'). $file_name;
            $path_thumbnail = config('constant.path_user_avatar2') . $file_name;
            $path_medium = config('constant.path_user_avatar3') . $file_name;
            $path_large = config('constant.path_user_avatar4'). $file_name;

            unlink($path_large);
            unlink($path_thumbnail);
            unlink($path_original);
            unlink($path_medium);
            $photo->delete();
        }

       if($file = $request->avatar_id);
        $file_name = time() . '.' . $file->getClientOriginalName();
        $path_original = config('constant.path_user_avatar1'). $file_name;
        $path_thumbnail = config('constant.path_user_avatar2'). $file_name;
        $path_medium = config('constant.path_user_avatar3'). $file_name;
        $path_large =  config('constant.path_user_avatar4'). $file_name;
        Image::make($file)->fit(150, 150)->save($path_thumbnail);
        Image::make($file)->fit(500, 500)->save($path_medium);
        Image::make($file)->fit(900, 900)->save($path_large);
        Image::make($file)->save($path_original);


        $photo = Photo::create(['path' => $file_name]);
        $user->avatar_id = $photo->id;
        $user->save();
        return $user->avatar_id;

    }
    public function destroy($id){
     $user=User::findorFail($id);
     $user->delete();
     return redirect('users');
    }
    public function trash(){
        $users=User::onlyTrashed()->get();
        return view('User.trash',compact('users'));
    }
    public function deletetrash($id){
       User::onlyTrashed($id)->where('id',$id)->forcedelete();
      return redirect('trash/users');
    }
    public function restoredelete($id){
        User::onlyTrashed()->where('id',$id)->restore();
        return redirect('trash/users');
    }
    public function deletealltrash(){
        User::onlyTrashed()->forcedelete();
        return redirect('trash/users');
    }
    public function restorealldelete(){
        User::onlyTrashed()->restore();
        return redirect('trash/users');
    }
    public function editPass($id){
        $user=User::find($id);
     return view('User.setpass',compact('user'));
    }
    public function setPass(PasswordRequest $request,$id){
      $user=User::find($id);
      $user->password=$request->password;
      $user->save();
      Session::flash('set_password','پسورد تغییر کرد');
      return redirect('users');
    }





}
