<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable=['name','header','about','about_team','is_active','avatar','state','city','created_at','updated_at'];
    public function types(){
        return $this->belongsToMany('App\Type');
    }
    public function posts(){
        return $this->hasMany('App\Post','event_id');
    }
    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
    public function subscribers(){
        return $this->belongsToMany('App\User','subscribers')->withTimestamps();
    }

    public function avatarImage(){
        return $this->belongsTo('App\Eventphoto','avatar');
    }
    public function province(){
        return $this->belongsTo('App\State','state');
    }
    public function town(){
        return $this->belongsTo('App\City','city');
    }
    public function tourManagers(){
        return $this->belongsToMany('App\User','touremanagers')->withTimestamps();
    }

}
