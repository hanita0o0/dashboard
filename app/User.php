<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Notifications\verifyEmail;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates=['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password','state_id','city_id','bio','address',
        'gender','name_header','phone','avatar_id','role_id','activation_no','api_token','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar(){
        return $this->belongsTo('App\Photo','avatar_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Post','user_id');
    }
    public function events(){
        return $this->belongsToMany('App\Event','subscribers');
    }
    public function tourManager(){
        return $this->belongsToMany('App\Event','touremanagers');
    }
    public function tickets(){
        return $this->belongsToMany('App\Ticket','ticket_user');
    }
    public function state(){
        return $this->belongsTo('App\State');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function toureManagers(){
        return $this->belongsToMany('App\Event','touremanagers');
    }
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function likes(){
        return $this->belongsToMany('App\Post','likes');
    }
    protected function setPasswordAttribute($value){
        $this->attributes['password']=Hash::make($value);
    }
    public function isAdmin()

    {
       foreach($this->roles as $role){
          if($role->name=="administrator"){
              return true;
          }
          else return false;
       }

    }

    /** return true if the user is verified;
     * @return bool
     */
    public function verified(){
        return $this->activation_no === null;
    }

    /**
     * send verification email to user
     */
   public function sendVerificaionEmail()
   {

       $this->notify(new verifyEmail($this));
   }


}
