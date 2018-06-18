<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Requests\UserFormRequest;
use App\Mail\UserRegistrationEmail;
use Illuminate\Support\Facades\Mail;

use App\UserBiography;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|max:255|',
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
        $email = $data['email'];

        $user = User::create([
            'First_Name' => $data['firstName'],
            'Last_Name' => $data['lastName'],
            'email' => $email,
            'password' => Hash::make($data['password']),
            'username' => $data['username']
        ]);

        $bio = UserBiography::create([

            'user_id' => $user->id,

            'biography' => ''

        ]); 

        Mail::to($user->email)->send(new UserRegistrationEmail($user));
        return $user;

    }

    public function emailSearch($user)
    {
        echo $user->id;
        

        // return $user;
    }
}
