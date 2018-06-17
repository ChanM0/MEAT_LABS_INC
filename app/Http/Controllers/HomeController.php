<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBiography;

use App\Post;


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
        try{
            $posts = Post::with('comments.author')->with('user')
            ->orderBy('created_at', 'desc')->get();
        // return $posts;
            return view('home',compact('posts'));
        }
         catch (Exception $e) {
            return view('auth.login');
         }
        
    }
}
