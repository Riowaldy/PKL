<?php

namespace App\Http\Controllers\AuthMember;

use App\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\RegisteredMember;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:member');
    }
     public function showRegistrationForm()
    {
        return view('authMember.register');
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
        return Member::create([
            'name' => $data['name'],
            'status' => 'member',
            'email' => $data['email'],
            
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new RegisteredMember($member = $this->create($request->all())));
        // $this->guard('member')->login($member);
        // return $this->registered($request, $member)
        //                 ?: redirect(route('member.home'));
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Attempt to log the user in
        if (Auth::guard('member')->attempt($credential, $request->member)) {
            // if login succesful, then redirect to their intended location
            return redirect()->intended(route('member.home'));
        }
    }
}