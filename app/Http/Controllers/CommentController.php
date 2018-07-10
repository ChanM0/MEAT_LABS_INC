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

use App\Contracts\CommentContract;

class CommentController extends Controller
{
    protected $commentRetriever = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CommentContract $commentRetriever)
    {
        $this->middleware('auth');

        $this->commentRetriever = $commentRetriever;

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(CommentFormRequest $request,$user_id)
     {

        $commentData = [
            'user_id' => $user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment 
        ];

        $this->commentRetriever->storeComment($commentData);

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

        $commentData = [

            'comment_id' => $comment_id,
            'comment' => $request->comment

        ];

        $this->commentRetriever->updateComment($commentData, $comment_id);
        
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

         $this->commentRetriever->deleteComment($comment_id);

         return back()->withInput();
     }


 }

