<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\copy_to_string;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\comment;

use App\Services\AllService;
class PostController extends Controller
{
    //
    protected $posts;

    public function __construct(AllService $service)
    {
        $this->posts =$service;

    }

    public function usersPosts(){
     $pp=Post::where('event_id',null)->get();
        $posts=[];
        foreach($pp as $post){
            $posts[]=['id'=>$post->id,
                'media_id'=>$post->media_id,
                'body'=>$post->body,
                'created_at'=>$post->created_at,
                'updated_at'=>$post->updated_at,
                'media_path'=>$post->media_id?$this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name: null,
                'username'=>$post->user?$post->user->name :""
            ];

        }

    return view('Post.postsusers',compact('posts'));

    }
    public function userPostShow($id){
      $post=Post::find($id);
        $media_path = null;
        if ($post->media_id){
            $media_path = $this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name;
        }
      return view('Post.postusershow',compact(['post','media_path']));
    }
    public function clubsPosts(){
   $pp=Post::where('event_id','!=',null)->get();
   $posts=[];
   foreach($pp as $post){
    $posts[]=['id'=>$post->id,
            'media_id'=>$post->media_id,
             'body'=>$post->body,
              'created_at'=>$post->created_at,
              'updated_at'=>$post->updated_at,
             'media_path'=>$post->media_id?$this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name: null,
                'username'=>$post->user?$post->user->name :"",
                'eventname'=>$post->event?$post->event->name :""
        ];

   }
  return view('Post.postsclubs',compact(['posts']));
      //return dd($posts) ;

    }
     public function clubPostShow($id){
        $post=Post::find($id);

        $media_path = null;
        if ($post->media_id){
            $media_path = $this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name;
        }
        return view('Post.postclubshow',compact(['post','media_path']));
    }

    public function delPostUser($id){
     $post=Post::find($id);

        $post->delete();
        $user=$post->user;
        $data=[
            'title'=>'Delete Post ',
            'content'=>" your post that created at " .(string)$post->created_at. " delete by administrator because this post determine destructive",
            'name'=>$user->name

        ];
     $this->posts->sendDeleteEmail($user,$data);

     return redirect('posts/users');

    }
    public function delPostClub($id){
     $post=Post::find($id);
     $post->delete();
        $user=$post->user;
        $club=$post->event;
        $data=[
            'title'=>'Delete Post ',
            'content'=>" your post that created at " .(string)$post->created_at. " delete by administrator because this post determine destructive",
            'name'=>$club->name
        ];
        $this->posts->sendDeleteEmail($user,$data);
     return redirect('posts/clubs');
    }

    public function trashPostsUsers(){
        $pp=Post::where('event_id',null)->onlyTrashed()->get();
        $posts=[];
        foreach($pp as $post){
            $posts[]=['id'=>$post->id,
                'media_id'=>$post->media_id,
                'body'=>$post->body,
                'created_at'=>$post->created_at,
                'updated_at'=>$post->updated_at,
                'media_path'=>$post->media_id?$this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name: null,
                'username'=>$post->user?$post->user->name :"",
            ];

        }
        return view('Post.trashPostsUsers',compact('posts'));
    }
    public function trashPostsClubs(){
        $pp=Post::where('event_id','!=',null)->onlyTrashed()->get();
        $posts=[];
        foreach($pp as $post){
            $posts[]=['id'=>$post->id,
                'media_id'=>$post->media_id,
                'body'=>$post->body,
                'created_at'=>$post->created_at,
                'updated_at'=>$post->updated_at,
                'media_path'=>$post->media_id?$this->getImageFoldersName(null,$post->photo->created_at).$post->photo->name: null,
                'username'=>$post->user?$post->user->name :"",
                'eventname'=>$post->event?$post->event->name :""
            ];

        }
        return view('Post.trashPostsClubs',compact('posts'));
    }
    public function deleteTrashPostUser($id){

        $posts=Post::onlyTrashed()->where('id',$id)->get();
        //return $post;
        foreach($posts as $post) {
            if ($post->media_id) {
                $this->deleteMedia($post);

            }
        }
        $post->comments()->delete();
        $post->likes()->detach();
        $post->delete();
        $post->forcedelete();

        return redirect('trash/posts/users');
    }
    public function deleteTrashPostClub($id){
       $posts=Post::onlyTrashed()->where('id',$id)->get();
        //return $post;
        foreach($posts as $post) {
              if ($post->media_id) {
                $this->deleteMedia($post);

            }
        }
        $post->comments()->delete();
        $post->likes()->detach();
        //$post->delete();
           $post->forcedelete();

        return redirect('trash/posts/clubs');
    }

    public function deleteAllTrashPostsUser(){
        $posts=Post::where('event_id',null)->onlyTrashed()->get();
        foreach($posts as $post) {
            if ($post->media_id) {
                $this->deleteMedia($post);
            }
            $post->comments()->delete();
            $post->likes()->detach();
            $post->forcedelete();
        }

        return redirect('trash/posts/users');
    }
    public function deleteAllTrashPostsClub(){

        $posts=Post::where('event_id','!=',null)->onlyTrashed()->get();
        //return $posts;
        foreach($posts as $post) {
            if ($post->media_id) {
                $this->deleteMedia($post);
            }
            $post->comments()->delete();
            $post->likes()->detach();
            $post->forcedelete();
        }


        return redirect('trash/posts/clubs');
    }
    public function restoreDeletePostUser($id){
        Post::onlyTrashed()->where('id',$id)->restore();
        return redirect('trash/posts/users');
    }
    public function restoreDeletePostClub($id){
        Post::onlyTrashed()->where('id',$id)->restore();
        return redirect('trash/posts/clubs');
    }
    public function restoreAllDeletePostsUsers(){
        Post::where('event_id',null)->onlyTrashed()->restore();
        return redirect('trash/posts/users');
    }
    public function restoreAllDeletePostsClubs(){
        Post::where('event_id','!=',null)->onlyTrashed()->restore();
        return redirect('trash/posts/clubs');
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

        if (!file_exists(config('constant.path_post_avatar').$directory.'/'.$date->year)){
            mkdir(config('constant.path_post_avatar').$directory.'/'.$date->year);
        }
        if (!file_exists(config('constant.path_post_avatar').$directory.'/'.$date->year.'/'.$date->month)){
            mkdir(config('constant.path_post_avatar').$directory.'/'.$date->year.'/'.$date->month);
        }
        if (!file_exists(config('constant.path_post_avatar').$directory.'/'.$date->year.'/'.$date->month.'/'.$date->day)){
            mkdir(config('constant.path_post_avatar').$directory.'/'.$date->year.'/'.$date->month.'/'.$date->day);
        }
        return ($directory.'/'.$date->year.'/'.$date->month.'/'.$date->day.'/');
    }
    protected function deleteMedia($post){
        //TODO:: have buggs
        $video_formats = array('.mp4', '.3gp');
        $image_formats = array('.png' , '.jpg', '.jpeg');
        $media_name = $post->photo->name;
        $media_format = null;
        foreach ($image_formats as $format){
            if (strrpos($media_name , $format) !== False){
//                return $media_name;
                $nameLocation = strrpos($media_name , $format);
                $name_lenght = strlen($media_name);
                $format_lenght = strlen($format);
                if ( $name_lenght- $format_lenght == $nameLocation){
                    $media_format = $format;
                    break;
                };
            }
        }

        foreach ($video_formats as $format){
            if (strrpos($media_name , $format) !== False){
                $nameLocation = strrpos($media_name , $format);
                $name_lenght = strlen($media_name);
                $format_lenght = strlen($format);
                if ( $name_lenght- $format_lenght == $nameLocation){
                    $media_format = $format;
                    break;
                };
            }
        }

//        if (in_array($media_format , $video_formats)){
//            $path = storage_path('videos/posts/'.$media_name);
//            unlink($path);
//        }

        if (in_array($media_format , $image_formats)){
            $path_original =config('constant.path_post_avatar1').$this->getImageFoldersName(null,$post->photo->created_at).$media_name;
            $path_medium = config('constant.path_post_avatar2').$this->getImageFoldersName(null,$post->photo->created_at).$media_name;
            $path_thumbnail = config('constant.path_post_avatar3').$this->getImageFoldersName(null,$post->photo->created_at).$media_name;
            unlink($path_original);
            unlink($path_medium);
            unlink($path_thumbnail);
        }
        $post->photo->delete();
    }
//
}
