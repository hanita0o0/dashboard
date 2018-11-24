<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable=['name','state_id'];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function events(){
        return $this->hasMany('App\Event','city');
    }
    public function state(){
        return $this->belongsTo('App\State');
    }
    public function tickets(){
        return $this->hasmany('App\Ticket','city');

    }
}
