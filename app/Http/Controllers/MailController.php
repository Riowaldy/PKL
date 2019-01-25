<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function post(Request $req)
    {
    	$req->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'subject'=>'required',
    		'message'=>'required',
    	]);

    	$data = [
    		'name'=>$req->name,
    		'email'=>$req->email,
    		'subject'=>$req->subject,
    		'bodyMassage'=>$req->message,
    	];

    	Mail::send('post.mail',$data,function($message) use($data){
    		$message->from($data['email']);
    		$message->to('diskominfositubondo@gmail.com', 'laravel2');
    		$message->subject($data['subject']);
    	});

    	return back()->with('success', 'Masukan Berhasil Terkirim');
    }
}
