<?php

namespace App\Http\Controllers\AuthKepala;

use App\Kepala;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\RegisteredKepala;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:kepala');
    }
     public function showRegistrationForm()
    {
        return view('authKepala.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Kepala::create([
            'name' => $data['name'],
            'status' => 'kepala',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new RegisteredKepala($member = $this->create($request->all())));
        // $this->guard('member')->login($member);
        // return $this->registered($request, $member)
        //                 ?: redirect(route('member.home'));
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Attempt to log the user in
        if (Auth::guard('kepala')->attempt($credential, $request->member)) {
            // if login succesful, then redirect to their intended location
            return redirect()->intended(route('kepala.home'));
        }
    }
}