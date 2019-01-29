<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\RegisteredAdmin;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
     public function showRegistrationForm()
    {
        return view('authAdmin.register');
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
        return Admin::create([
            'name' => $data['name'],
            'status' => $data['status'],
            'email' => $data['email'],
            
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new RegisteredAdmin($admin = $this->create($request->all())));
        // $this->guard('admin')->login($admin);
        // return $this->registered($request, $admin)
        //                 ?: redirect(route('admin.home'));
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Attempt to log the user in
        if (Auth::guard('admin')->attempt($credential, $request->member)) {
            // if login succesful, then redirect to their intended location
            return redirect()->intended(route('admin.home'));
        }
    }
}