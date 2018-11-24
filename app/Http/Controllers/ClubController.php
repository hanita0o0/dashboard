<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditClubRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Event;
use App\User;
use App\State;
use App\City;
use App\Post;
use App\Ticket;
use App\Eventphoto;
use Carbon\Carbon;
use Image;
class ClubController extends Controller
{
    //

    public function index(){

        $ee=Event::all();
        $events=[];
        foreach($ee as $event){
            $events[]=[
                'id'=>$event->id,
                'name'=>$event->name,
                'avatar_id'=>$event->avatar,
                'state'=>$event->province?$event->province->name:"",
                'city'=>$event->town ? $event->town->name : "",
                'tourManager'=>$event->tourManagers->first() ? $event->tourManagers->first()->name: null,
                'created_at'=>$event->created_at,
                'updated_at'=>$event->updated_at,
                'avatar_path'=>$event->avatar?$this->getImageFoldersName(null,$event->avatarImage->created_at).$event->avatarImage->path: null,
            ];

        }
        //return $events;
       return view('Club.index',compact('events'));
    }
    public function show($id){
        $event=Event::findOrFail($id);
        $avatar_path = null;
        if ($event->avatar){
            $avatar_path = $this->getImageFoldersName(null,$event->avatarImage->created_at).$event->avatarImage->path;
        }
        return view('Club.show',compact(['event','avatar_path']));
    }
    public function edit($id){
        $users=User::all();
        $event=Event::findOrFail($id);
        if($event->state){
            $stId=$event->state;
        }
        if($event->city){
            $ctId=$event->city;
        }

        $state=State::pluck('name','id')->except('id',$stId)->all();
        $city=City::pluck('name','id')->except('id',$ctId)->all();
        $avatar_path = null;
        if ($event->avatar){
            $avatar_path = $this->getImageFoldersName(null,$event->avatarImage->created_at).$event->avatarImage->path;
        }
        return view('Club.edit',compact(['event','state','city','users','avatar_path']));

    }
    public function update(EditClubRequest $request, $id){
     $club=event::find($id);
        $input=$request->all();
      //  $file=$request->file('avatar');

        if ($request->hasFile('avatar')) {
            //todo:have to delete the last avatar

           $input['avatar']= $this->updateAvatar($request, $club);
        }
     $club->update($input);
     $club->tourManagers()->sync($request->input('manager'));

       return redirect('clubs');

    }
    public function updateAvatar($input, $event)
    {


        if ($id = $event->avatar) {
            $photo = Eventphoto::find($id);
            $file_name = $photo->path;
            $path_original =  config('constant.path_club_avatar1') . $this->getImageFoldersName(null, $photo->created_at) . $file_name;
            $path_thumbnail =  config('constant.path_club_avatar2'). $this->getImageFoldersName(null, $photo->created_at) . $file_name;
            $path_medium = config('constant.path_club_avatar3'). $this->getImageFoldersName(null, $photo->created_at) . $file_name;


            unlink($path_thumbnail);
            unlink($path_original);
            unlink($path_medium);
            $photo->delete();
        }
        if ($file = $input->avatar) {
            $file_name = time() . '.' . $file->getClientOriginalName();
            $path_original = config('constant.path_club_avatar').$this->getImageFoldersName('photos/events/event_profile/original') . $file_name;
            $path_thumbnail =config('constant.path_club_avatar').$this->getImageFoldersName('photos/events/event_profile/thumbnail') . $file_name;
            $path_medium =config('constant.path_club_avatar').$this->getImageFoldersName('photos/events/event_profile/medium'). $file_name;
            Image::make($file)->fit(150, 150)->save($path_thumbnail);
            Image::make($file)->fit(300, 300)->save($path_medium);
            Image::make($file)->save($path_original);
            $photo = Eventphoto::create(['path' => $file_name]);
            return $photo->id;
        } else {
            return null;
        }


    }

    public function subs($id){
        $subscribe = DB::select('select user_id ,users.name 
                                     from subscribers
                                     INNER JOIN users ON subscribers.user_id=users.id
                                     WHERE event_id='.$id
        );
        //return $subscribe;
        return view('Club.subscribe',compact('subscribe'));

    }
    public function showPosts($id){
        $pp=Post::where('event_id',$id)->get();
        $posts=[];
        foreach($pp as $post){
            $posts[]=[
                'id'=>$post->id,
                'body'=>$post->body ? $post->body : null,
                'media_id'=>$post->media_id?$post->media_id:null,
                'created_at'=>$post->created_at? $post->created_at : null,
                'updated_at'=>$post->updated_at ? $post->updated_at : null,
                'media_path'=>$post->media_id?$this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name: null

            ];

        }
       return view('Club.clubposts',compact('posts'));
    }
    public function showTickets($id){
    $tt=Ticket::where('event_id',$id)->get();
        $tickets=[];
        foreach($tt as $ticket){
            $tickets[]=[
                'id'=>$ticket->id,
                'name'=>$ticket->name?$ticket->name: null,
                'avatar_id'=>$ticket->avatar_id?$ticket->avatar_id:null,
                'date'=>$ticket->date?$ticket->date :null,
                'endDate'=>$ticket->end_date?$ticket->end_date :null,
                'created_at'=>$ticket->created_at? $ticket->created_at : null,
                'updated_at'=>$ticket->updated_at? $ticket->updated_at : null,
                'avatar_path'=>$ticket->avatar_id?$this->getImageFoldersName(null,$ticket->avatar->created_at).$ticket->avatar->path: null,
                'address'=>$ticket->address? $ticket->address : null,
                'state'=>$ticket->is_active==1?"فعال": "غیرفعال"
                ];

        }
    return view('Club.clubtickets',compact('tickets'));
    }
    protected function getImageFoldersName($directory=null , $date="nothing"){

        if ($date == "nothing"){
            $date = Carbon::now();
        }else{
            $date = Carbon::parse($date);
        }

        if ($directory==null){
            return ('/'.$date->year.'/'.$date->month.'/'.$date->day.'/');
        }

        if (!file_exists(config('constant.path_club_avatar').$directory.'/'.$date->year)){
            mkdir(config('constant.path_club_avatar').$directory.'/'.$date->year);
        }
        if (!file_exists(config('constant.path_club_avatar').$directory.'/'.$date->year.'/'.$date->month)){
            mkdir(config('constant.path_club_avatar').$directory.'/'.$date->year.'/'.$date->month);
        }
        if (!file_exists(config('constant.path_club_avatar').$directory.'/'.$date->year.'/'.$date->month.'/'.$date->day)){
            mkdir(config('constant.path_club_avatar').$directory.'/'.$date->year.'/'.$date->month.'/'.$date->day);
        }
        return ($directory.'/'.$date->year.'/'.$date->month.'/'.$date->day.'/');
    }

}
