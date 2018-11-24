<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
class Post extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['body','user_id','event_id','media_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function event(){
        return $this->belongsTo('App\Event','event_id');
    }
    public  function photo(){
        return $this->belongsTo('App\Postmedia','media_id' );
    }
    public function comments(){
        return $this->hasMany('App\comment');
    }

    public function likes(){
        return $this->belongsToMany('App\User','likes');
    }

}
