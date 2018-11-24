<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function users(){
        return $this->hasMany('App\User');
    }
    public function events(){
        return $this->hasMany('App\Event','state');
    }
    public function cities(){
        return $this->hasMany('App\City');
    }
    public function tickets(){
        return $this->hasmany('App\Ticket','state');

    }
}
