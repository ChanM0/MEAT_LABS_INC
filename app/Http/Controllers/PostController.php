<?php

namespace App\Http\Controllers;


use App\Post;
use App\User;

// You may access the authenticated user via the Auth facade:
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Contracts\PostContract;

use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    protected $postRetriever = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostContract $postRetriever) //dependency inject
    {
        $this->middleware('auth');

        $this->postRetriever = $postRetriever;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request,$user_id)
    {
        //create a requests file that makes sure post is not null

        if(Auth::user()->id === intval($user_id)){

            $post = Post::create([

                'user_id' => $user_id,

                'post' => $request->post

            ]);

            return back()->withInput();

        }

        return back()->withInput();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        
        //checks if the Authenticated user is able to see the edit post
        if( (!is_null($post)) && Auth::user()->id === $post->user_id ){

            return view('forms.postEditForm',compact('post'));

        }

        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request,$user_id)
    {
        $postData = [
            'post_id' => $request->post_id,
            'post' => $request->post
        ];

        $this->postRetriever->updatePost($postData, $user_id);

        return redirect()->route('home');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
     public function delete($post_id)
     {

        $post = Post::where('id', $post_id)->first();
        
        if(!is_null($post)){

            $user = User::where('id',$post->user_id)->first();

            if( !is_null( $user ) && (Auth::user()->id === $user->id || Auth::user()->admin === 1)  ){

                Post::where('id', $post_id)->delete();

            }

        }

        return back()->withInput();
    }

}
