<?php
/**
 * Created by PhpStorm.
 * User: shahla
 * Date: 10/11/2018
 * Time: 4:03 PM
 */

namespace App\Services;
use Illuminate\Support\Facades\Mail;

class AllService
{
    public function sendDeleteEmail($user,$data){


        Mail::send('mails.myMail',$data,function($message) use ($user){
            $message->to($user->email,$user->name)->subject('Delete Post');
        });
    }


}