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
Route::post('events','EventController@addEvent')->name('events.add');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');

// ADMIN ROUTE
Route::group (['prefix' => 'admin'], function(){

	// auth
	Route::get('/register', 'Authadmin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('/register', 'Authadmin\RegisterController@register')->name('admin.register.submit');
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
    Route::get('/calendar','AdminController@AdminCalendar')->name('post.AdminCalendar')->middleware('auth:admin');
    Route::get('/task','AdminController@AdminTask')->name('post.AdminTask')->middleware('auth:admin');
    Route::get('/laporan','AdminController@AdminLaporan')->name('post.AdminLaporan')->middleware('auth:admin');
    Route::get('/task/{task}','AdminController@AdminShowTask')->name('post.AdminShowTask')->middleware('auth:admin');
    Route::get('/AdminNotification','AdminController@AdminNotification')->name('post.AdminNotification')->middleware('auth:admin');
    Route::get('/AdminMember','AdminController@AdminMember')->name('post.AdminMember')->middleware('auth:admin');
    Route::get('/AdminProfil','AdminController@AdminProfil')->name('post.AdminProfil')->middleware('auth:admin');

    // create
	Route::post('/AdminCreate','AdminController@AdminStore')->name('post.AdminStore')->middleware('auth:admin');
	Route::post('/project/task/store','AdminController@AdminTaskStore')->name('post.AdminTaskStore')->middleware('auth:admin');
	Route::post('/project/{post}/comment','PostCommentController@AdminStore')->name('post.AdminComment')->middleware('auth:admin');
	Route::post('/AdminAddStore','AdminController@AdminAddStore')->name('post.AdminAddStore')->middleware('auth:admin');

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
	Route::get('/register', 'Authmember\RegisterController@showRegistrationForm')->name('member.register');
	Route::post('/register', 'Authmember\RegisterController@register')->name('member.register.submit');
	Route::get('/login', 'AuthMember\LoginController@showLoginFormMember')->name('member.login');
	Route::post('/login', 'AuthMember\LoginController@loginMember')->name('member.login.submit');
	

	// view
	Route::get('/project','MemberController@MemberProject')->name('post.MemberProject')->middleware('auth:member');
	Route::get('/project/{post}','MemberController@MemberShow')->name('post.MemberShow')->middleware('auth:member');
	Route::get('/MemberCalendar','MemberController@MemberCalendar')->name('post.MemberCalendar')->middleware('auth:member');
	Route::get('/MemberNotification','MemberController@MemberNotification')->name('post.MemberNotification')->middleware('auth:member');
	Route::get('/task/{task}','MemberController@MemberShowTask')->name('post.MemberShowTask')->middleware('auth:member');
	Route::get('/MemberProfil','MemberController@MemberProfil')->name('post.MemberProfil')->middleware('auth:member');

	// create
	Route::post('/project/{post}/comment','PostCommentController@MemberStore')->name('post.MemberComment')->middleware('auth:member');
	// update
	Route::post('/MemberStatus','MemberController@MemberStatus')->name('MemberStatus')->middleware('auth:member');
	Route::post('/MemberUpdate','MemberController@MemberUpdate')->name('MemberUpdate')->middleware('auth:member');

	// delete


});

// SKPD ROUTE
Route::group (['prefix' => 'skpd'], function(){
	// auth
	Route::get('/register', 'Authskpd\RegisterController@showRegistrationForm')->name('skpd.register');
	Route::post('/register', 'Authskpd\RegisterController@register')->name('skpd.register.submit');
	Route::get('/login', 'AuthSkpd\LoginController@showLoginForm')->name('skpd.login');
	Route::post('/login', 'AuthSkpd\LoginController@login')->name('skpd.login.submit');

	// view
	Route::get('/', 'SkpdController@index')->name('skpd.home');
	Route::get('/SkpdLaporan','SkpdController@SkpdLaporan')->name('post.SkpdLaporan')->middleware('auth:skpd');
	Route::get('/SkpdProfil','SkpdController@SkpdProfil')->name('post.SkpdProfil')->middleware('auth:skpd');

	// create
	Route::post('/SkpdCreate','SkpdController@SkpdStore')->name('post.SkpdStore')->middleware('auth:skpd');

	// update
	Route::post('/SkpdUpdate','SkpdController@SkpdUpdate')->name('SkpdUpdate')->middleware('auth:skpd');

	// delete



});

// KEPALA ROUTE
Route::group (['prefix' => 'kepala'], function(){
	// auth
	Route::get('/register', 'Authkepala\RegisterController@showRegistrationForm')->name('kepala.register');
	Route::post('/register', 'Authkepala\RegisterController@register')->name('kepala.register.submit');
	Route::get('/login', 'AuthKepala\LoginController@showLoginForm')->name('kepala.login');
	Route::post('/login', 'AuthKepala\LoginController@login')->name('kepala.login.submit');

	// view
	Route::get('/', 'KepalaController@index')->name('kepala.home');
	Route::get('/project','KepalaController@KepalaProject')->name('post.KepalaProject')->middleware('auth:kepala');
	Route::get('/search','KepalaController@search');
	Route::get('/project/{post}','KepalaController@KepalaShow')->name('post.KepalaShow')->middleware('auth:kepala');
	Route::get('/task','KepalaController@KepalaTask')->name('post.KepalaTask')->middleware('auth:kepala');
	Route::get('/laporan','KepalaController@KepalaLaporan')->name('post.KepalaLaporan')->middleware('auth:kepala');
	Route::get('/KepalaMember','KepalaController@KepalaMember')->name('post.KepalaMember')->middleware('auth:kepala');
	Route::get('/KepalaProfil','KepalaController@KepalaProfil')->name('post.KepalaProfil')->middleware('auth:kepala');
	Route::post('/KepalaDetailTask','KepalaController@DetailTask')->name('DetailTask')->middleware('auth:kepala');

	// create


	// update
	Route::post('/KepalaUpdate','KepalaController@KepalaUpdate')->name('KepalaUpdate')->middleware('auth:kepala');
	Route::post('/KepalaUpdateAdmin','KepalaController@KepalaUpdateAdmin')->name('KepalaUpdateAdmin')->middleware('auth:kepala');
	Route::post('/KepalaUpdateMember','KepalaController@KepalaUpdateMember')->name('KepalaUpdateMember')->middleware('auth:kepala');
	Route::post('/KepalaUpdateSkpd','KepalaController@KepalaUpdateSkpd')->name('KepalaUpdateSkpd')->middleware('auth:kepala');

	// delete
	Route::delete('/KepalaDeleteAdmin','KepalaController@KepalaDestroyAdmin')->name('KepalaDeleteAdmin')->middleware('auth:kepala');
	Route::delete('/KepalaDeleteMember','KepalaController@KepalaDestroyMember')->name('KepalaDeleteMember')->middleware('auth:kepala');
	Route::delete('/KepalaDeleteSkpd','KepalaController@KepalaDestroySkpd')->name('KepalaDeleteSkpd')->middleware('auth:kepala');


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
