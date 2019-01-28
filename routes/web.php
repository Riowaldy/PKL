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
Route::get('/home/logout', 'Auth\LoginController@logoutUser')->name('home.logout');

Route::post('postMail', 'MailController@post')->name('postmail');

// ADMIN ROUTE
Route::group (['prefix' => 'admin'], function(){

	// auth
	Route::get('/login', 'AuthAdmin\LoginController@showLoginFormAdmin')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@loginAdmin')->name('admin.login.submit');
	Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
	Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');

    // view
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/project','AdminController@AdminProject')->name('post.AdminProject')->middleware('auth:admin');
    Route::get('/project/{post}','AdminController@AdminShow')->name('post.AdminShow')->middleware('auth:admin');
    Route::get('/task','AdminController@AdminTask')->name('post.AdminTask')->middleware('auth:admin');
    Route::get('/task/{task}','AdminController@AdminShowTask')->name('post.AdminShowTask')->middleware('auth:admin');
    Route::get('/AdminCalendar','AdminController@AdminCalendar')->name('post.AdminCalendar')->middleware('auth:admin');
    Route::get('/AdminNotification','AdminController@AdminNotification')->name('post.AdminNotification')->middleware('auth:admin');
    Route::get('/AdminMember','AdminController@AdminMember')->name('post.AdminMember')->middleware('auth:admin');
    Route::get('/AdminProfil','AdminController@AdminProfil')->name('post.AdminProfil')->middleware('auth:admin');

    // create
    Route::get('/project/create','AdminController@AdminCreate')->name('post.AdminCreate')->middleware('auth:admin');
	Route::post('/project/create','AdminController@AdminStore')->name('post.AdminStore')->middleware('auth:admin');
	Route::post('/project/task/store','AdminController@AdminTaskStore')->name('post.AdminTaskStore')->middleware('auth:admin');

    // update
	Route::post('/AdminUpdatePost','AdminController@AdminUpdatePost')->name('AdminUpdatePost')->middleware('auth:admin');
	Route::post('/AdminUpdateTask','AdminController@AdminUpdateTask')->name('AdminUpdateTask')->middleware('auth:admin');
	Route::post('/AdminUpdateUser','AdminController@AdminUpdateUser')->name('AdminUpdateUser')->middleware('auth:admin');
	Route::post('/AdminUpdate','AdminController@AdminUpdate')->name('AdminUpdate')->middleware('auth:admin');

    // delete
    Route::delete('/AdminDeleteProject','AdminController@AdminDestroyProject')->name('AdminDeleteProject')->middleware('auth:admin');
    Route::delete('/AdminDeleteTask','AdminController@AdminDestroyTask')->name('AdminDeleteTask')->middleware('auth:admin');
    Route::delete('/AdminDeleteUser','AdminController@AdminDestroyUser')->name('AdminDeleteUser')->middleware('auth:admin');

});


// MEMBER ROUTE
Route::get('/memberhome', 'MemberController@indexMember')->name('member.home');
Route::group (['prefix' => 'member'], function(){
	// auth
	Route::get('/login', 'AuthMember\LoginController@showLoginFormMember')->name('member.login');
	Route::post('/login', 'AuthMember\LoginController@loginMember')->name('member.login.submit');

	// view
	

	// create

	// update

	// delete


});

// USER ROUTE
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
