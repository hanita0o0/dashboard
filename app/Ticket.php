<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'name','date','body','event_id','filter_id','activation_num','filter_id','price','state','city','address','avatar_id','end_date','is_active'
    ];
    public function event(){
        return $this->belongsTo('App\Event');
    }
    public function avatar(){
        return $this->belongsTo('App\Ticketavatar','avatar_id');
    }
    public function City(){
        return $this->belongsTo('App\City','city');
    }

    public function State(){
        return $this->belongsTo('App\State','state');
    }
}
