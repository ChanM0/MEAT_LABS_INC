<?php

namespace App\Http\Controllers;


use App\Post;


// You may access the authenticated user via the Auth facade:
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a requests file that makes sure post is not null
        $post = Post::create([
            'user_id' => $request->user_id,
            'post' => $request->post
        ]);
        // return $post;
        return back()->withInput();
        // return redirect()->route( 'profile', [$request->email] );
        echo "Connection works store";
    }

    public function mainForum(){
        $posts = Post::with('comments.author')->with('user')
        ->orderBy('created_at', 'desc')->get();
        // return $posts;
        return view('user.mainForum',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        
        //checks if the Authenticated user is able to see the edit post
        if( Auth::user()->id === $post->user_id ){
            return view('forms.postEditForm',compact('post'));
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //checks if the Authenticated user is able to see the edit post
        if( Auth::user()->id === intval($request->user_id) ){
            $post = Post::where('id', $request->post_id)
                     ->update(['post' => $request->post]);
            return redirect()->route( 'home' );
        }
        else{
            return redirect()->route('home');
        }
        echo "Connection works update";
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
     {
        Post::where('id', $id)->delete();
        return back()->withInput();
        echo "Connection works delete";
    }

}
