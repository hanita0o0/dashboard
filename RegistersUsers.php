<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\State;
use App\City;
use App\User;
use App\Http\Controllers\UserController;
use Image;
use App\Photo;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $state=State::all();
        $city=City::all();

        return view('auth.register',compact('state','city'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input=$request->all();

        $file=$request->file('avatar_id');
        if($file){
            $file_name = time() . '.' . $file->getClientOriginalName();
            $path_original = config('constant.path_user_avatar1'). $file_name;
            $path_thumbnail = config('constant.path_user_avatar2'). $file_name;
            $path_medium = config('constant.path_user_avatar3'). $file_name;
            $path_large =  config('constant.path_user_avatar4'). $file_name;
            Image::make($file)->fit(150, 150)->save($path_thumbnail);
            Image::make($file)->fit(500, 500)->save($path_medium);
            Image::make($file)->fit(900, 900)->save($path_large);
            Image::make($file)->save($path_original);
            $photo=new Photo();
            $photo->path=$file_name;
            $photo->save();
           $input['avatar_id']=$photo->id;
        }
        $this->validator($input)->validate();
        event(new Registered($user = $this->create($input)));
        //




        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

      
    }

}
