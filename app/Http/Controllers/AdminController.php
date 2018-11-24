<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Club;
use App\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = DB::select('select count(*) as numuser from users ');
        $clubs = DB::select('select count(*) as numclub from events');
        $userNew = DB::select('select count(*) as numnewuser from users where DATE(created_at)=CURDATE()');
        $postUser = DB::select('select count(*) as numpostuser from posts  where event_id is Null');
        $postEvent = DB::select('select count(*) as numpostevent from posts  where event_id is not null ');

        $subscribe = DB::select('select count(user_id) as subs,events.name 
                              from subscribers
                              INNER JOIN events ON subscribers.event_id=events.id
                              GROUP BY events.name');

        $subscribers = DB::select('select count(*) as userSubs from subscribers');
        $totalSubs = $subscribers[0]->userSubs;

        return view('index', compact('users', 'clubs',
            'userNew', 'postUser', 'postEvent', 'subscribe', 'subscribers', 'totalSubs'));

    }

}
