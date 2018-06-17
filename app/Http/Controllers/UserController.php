<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBiography;
use App\Post;
use App\Comment;

// You may access the authenticated user via the Auth facade:
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * 
     */
    public function profile($email)
    {
        $user = User::where('email',$email)->first();
        $bio = UserBiography::where('user_id', $user->id )->first();
        //need to get users associated with this comment
        // $posts = Post::with('comments.author')->with('user')->where('user_id', $user->id)->get();
        $posts = Post::with('comments.author')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        // return $posts;
        if(!is_null($bio)){
            return view('user.profile',compact('bio','user','posts'));

        }
        return redirect()->route('home');
    }

    public function usernameEdit($id)
    {
        // return $id;
        $user = User::where('id', $id)->first();
        // return $user;

        //checks if the Authenticated user is able to see the edit comment
        if( Auth::user()->id === $user->id ){
            // return ['status'=>'true'];
            return view('forms.usernameEditForm',compact('user', 'id' ));
        }
        else{
            return ['status'=>'false'];
            return redirect()->route('home');
        }

    }

    public function usernameUpdate(Request $request)
    {
        // return $request;
        // return  Auth::user();
        if( Auth::user()->id === intval($request->user_id) ){
            $user = User::where('id', $request->user_id)
            ->update(['username' => $request->username]);
            return redirect()->route( 'home' );
        }
        else{
            // return ['status' => 'false'];
            return redirect()->route('home');
        }

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
