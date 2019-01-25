<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function member()
    {
    	$users = User::latest()->paginate(3);

    	return view('user.member');
    }
}
