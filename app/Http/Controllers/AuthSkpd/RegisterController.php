<?php

namespace App\Http\Controllers\AuthSkpd;

use App\Skpd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\RegisteredSkpd;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:skpd');
    }
     public function showRegistrationForm()
    {
        return view('authSkpd.register');
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
        return Skpd::create([
            'name' => $data['name'],
            'status' => 'skpd',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new RegisteredSkpd($member = $this->create($request->all())));
        // $this->guard('member')->login($member);
        // return $this->registered($request, $member)
        //                 ?: redirect(route('member.home'));
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Attempt to log the user in
        if (Auth::guard('skpd')->attempt($credential, $request->member)) {
            // if login succesful, then redirect to their intended location
            return redirect()->intended(route('skpd.home'));
        }
    }
}