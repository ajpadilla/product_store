<?php

namespace App\Http\Controllers\Auth;

use App\Store\User\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectPath = '/dashboard';

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
           /* 'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',*/
            'first_name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'username' => 'required|unique:users,username|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:60|confirmed',
            'password_confirmation' => 'required|min:6|max:60',
            'address' => 'required|max:255',
            'post_code' => 'required|max:5',
            'country_id' => 'required|exists:countries,id',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            /*'active' => '',
            'role' => '',*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            /*'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),*/
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'address' => $data['address'],
            'post_code' => $data['address'],
            'country_id' => $data['address'],
            'phone' => $data['address'],
            /*'active' => ,
            'role' => ,*/
        ]);
    }

    /*protected function getCredentials(Request $request) 
    {
        $request['active'] = 1;
        return $request->only($this->loginUsername(), 'password', 'active');
    }*/

    /*public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }*/

}
