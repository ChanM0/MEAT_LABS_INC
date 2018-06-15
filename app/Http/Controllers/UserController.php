<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBiography;
use App\Post;
use App\Comment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "connection works!";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile($email){
        $user = User::where('email',$email)->first();
        $bio = UserBiography::where('user_id', $user->id )->first();
        //need to get users associated with this comment
        // $posts = Post::with('comments.author')->with('user')->where('user_id', $user->id)->get();
        $posts = Post::with('comments.author')->where('user_id', $user->id)->get();
        // return $posts;
        if(!is_null($bio)){
            return view('user.profile',compact('bio','user','posts'));

       }
       return redirect()->route('home');
   }
}
