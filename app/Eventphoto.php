<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventphoto extends Model
{
    //
    protected $fillable=['path'];
    public function avatarImage(){
        return $this->hasOne('App\Event','avatar');
    }


}
