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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('postMail', 'MailController@post')->name('postmail');

Route::middleware('auth')->group(function(){
	Route::get('/post','PostController@index')->name('post.index')->middleware('auth');
	Route::get('/calendar','PostController@calendar')->name('post.calendar')->middleware('auth');
	Route::get('/notification','PostController@notification')->name('post.notification')->middleware('auth');
	Route::get('/task','PostController@task')->name('post.task')->middleware('auth');
	Route::get('/portfolio','PostController@portfolio')->name('post.portfolio')->middleware('auth');
	Route::get('/member','PostController@member')->name('post.member')->middleware('auth');
	Route::get('/profil','PostController@profil')->name('post.profil')->middleware('auth');

	Route::post('/update','PostController@updatepro')->name('update')->middleware('auth');
	Route::post('/status','PostController@update4')->name('status')->middleware('auth');
	Route::post('/updatepost','PostController@update3')->name('updatepost')->middleware('auth');
	Route::post('/updatetask','PostController@update1')->name('updatetask')->middleware('auth');
	Route::post('/updateuser','PostController@update2')->name('updateuser')->middleware('auth');

	Route::get('/post/create','PostController@create')->name('post.create')->middleware('auth');
	Route::post('/post/create','PostController@store')->name('post.store')->middleware('auth');
	Route::post('/post/task/store','PostController@taskstore')->name('post.taskstore')->middleware('auth');

	Route::get('/searchcontent','PostController@searchcontent')->name('post.searchcontent')->middleware('auth');

	Route::get('/post/{post}','PostController@show')->name('post.show')->middleware('auth');
	Route::get('/showtask2','PostController@showtask2')->name('post.showtask2')->middleware('auth');
	Route::get('/task/{task}','PostController@showtask')->name('post.showtask')->middleware('auth');

	Route::delete('/deletepost','PostController@destroy')->name('deletepost')->middleware('auth');
	Route::delete('/deletetask','PostController@destroytask')->name('deletetask')->middleware('auth');
	Route::delete('/deleteuser','PostController@destroyuser')->name('deleteuser')->middleware('auth');

	Route::post('/post/{post}/comment','PostCommentController@store')->name('post.comment.store')->middleware('auth');
});
