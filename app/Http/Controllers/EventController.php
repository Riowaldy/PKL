<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;

class EventController extends Controller
{
    public function index(){
    	return view('events');
    }

    public function addEvent(Request $request){
    	$validator = Validator::make($request->all(), [
    		'event_name' => 'required',
    		'start_date' => 'required',
    		'end_date' => 'required'
    	]);
    	if($validator->fails()){
    		\Session::flash('warning','Please enter the valid details');
    		return Redirect::to('/events')->withInput()->withErrors($validator);
    	}

    	$event = new Event;
    	$event->event_name = $request['event_name'];
    	$event->start_date = $request['start_date'];
    	$event->end_date = $request['end_date'];
    	$event->save();

    	\Session::flash('success','Event added successfully.');
    	return Redirect::to('/events');
    }
}
