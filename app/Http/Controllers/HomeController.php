<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBiography;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  return $user;
        // $bio = UserBiography::find($user->biography);

        // return $bio;
         // if(is_null( $bio = UserBiography::find($user->biography)){
         //    return ['status'=>'true'];
           
         // }
        return view('home');
    }
}
