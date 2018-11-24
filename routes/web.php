<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'isAdmin']],function(){
Route::get('/','AdminController@index');

Route::resource('/users','UserController');
Route::get('users/pass/{id}','UserController@editPass');
Route::post('users/pass/{id}','UserController@setPass');

Route::resource('/clubs','ClubController');
Route::get('/clubs/subscribes/{id}','ClubController@subs');
Route::get('/clubs/posts/{id}','ClubController@showPosts');
Route::get('/clubs/tickets/{id}','ClubController@showTickets');

Route::get('/posts/users','PostController@usersPosts');
Route::get('/posts/users/show/{id}','PostController@userPostShow');
Route::delete('/posts/users/{id}','PostController@delPostUser');

Route::get('/posts/clubs','PostController@clubsPosts');
Route::get('/posts/clubs/show/{id}','PostController@clubPostShow')->name('postClub');
Route::delete('/posts/clubs/{id}','PostController@delPostClub');



Route::get('trash/users','UserController@trash');
Route::get('trash/users/all','UserController@deletealltrash');
Route::get('trash/user/{id}','UserController@deletetrash');
Route::get('restore/user/{id}','UserController@restoredelete');
Route::get('restore/users/all','UserController@restorealldelete');

Route::get('trash/posts/users','PostController@trashPostsUsers')->name('postsUsersTrash');
Route::get('trash/posts/users/all','PostController@deleteAllTrashPostsUser')->name('postsUsersDel');
Route::get('trash/post/users/{id}','PostController@deleteTrashPostUser')->name('postUserDel');
Route::get('restore/post/user/{id}','PostController@restoreDeletePostUser')->name('PostUserRestore');
Route::get('restore/posts/users/all','PostController@restoreAllDeletePostsUsers')->name('PostsUsersRestore');


Route::get('trash/posts/clubs','PostController@trashPostsClubs')->name('postsClubsTrash');
Route::get('trash/posts/clubs/all','PostController@deleteAllTrashPostsClub')->name('postsClubsDel');
Route::get('trash/post/clubs/{id}','PostController@deleteTrashPostClub')->name('postClubDel');
Route::get('restore/post/club/{id}','PostController@restoreDeletePostClub')->name('PostClubRestore');
Route::get('restore/posts/clubs/all','PostController@restoreAllDeletePostsClubs')->name('PostsClubsRestore');



Route::resource('/roles','RoleController');
Route::resource('/types','TypeController');

});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


//test send email
//Route::get('/test', function () {
//    $data=[
//        'title'=>'laravel mail',
//        'content'=>'I hope you learn laravel mail and enjoy them'
//
//    ];
//    Mail::send('mails.test',$data,function($message){
//        $message->to('shahi.alamir@gmail.com','alamir')->subject('hello student whats up');
//    });
//
//});
Route::get('verify/{activation_no}','verifyController@verify')->name('verify');
