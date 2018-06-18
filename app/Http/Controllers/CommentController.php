<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\CommentUpdateRequest;

// You may access the authenticated user via the Auth facade:
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
     public function store(CommentFormRequest $request,$user_id)
     {
        //make sure you check if the comment is null?
        if(Auth::user()->id === intval($user_id)){

            $comment = Comment::create([
                'user_id' => $user_id,
                'post_id' => $request->post_id,
                'comment' => $request->comment 
            ]);

        }

        return back()->withInput();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        //checks if the Authenticated user is able to see the edit comment
        if( (!is_null($comment)) && Auth::user()->id === $comment->user_id ){

            return view('forms.commentEditForm',compact('comment'));

        }

        return redirect()->route('home');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, $comment_id)
    {
        
        $comment = Comment::where('id', $comment_id)->first();

        if( (!is_null($comment))  && Auth::user()->id === intval($comment->user_id) ){

            $comment = Comment::where('id', $comment_id)

            ->update(['comment' => $request->comment]);

        }

        return redirect()->route('home');
        
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($comment_id)
     {
        $comment = Comment::where('id', $comment_id)->first();

        if(!is_null($comment)){

            $user = User::where('id',$comment->user_id)->first();

            if( !is_null( $user ) && (Auth::user()->id === $user->id || Auth::user()->admin === 1)  ){

                Comment::where('id', $comment_id)->delete();

            }

        }
        return back()->withInput();

    }
}
