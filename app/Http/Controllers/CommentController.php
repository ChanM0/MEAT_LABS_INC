<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
     public function store(Request $request)
     {
        //make sure you check if the comment is null?
         $comment = Comment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment 
        ]);

         return back()->withInput();

         echo "Connection works store";
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::where('id', $id)->first();

        //checks if the Authenticated user is able to see the edit comment
        if( Auth::user()->id === $comment->user_id ){
            return view('forms.commentEditForm',compact('comment'));
        }
        else{
            return redirect()->route('home');
        }
        echo "Connection works edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment_id)
    {
        if( Auth::user()->id === intval($request->user_id) ){
            $comment = Comment::where('id', $comment_id)
            ->update(['comment' => $request->comment]);
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
        Comment::where('id', $id)->delete();
        return back()->withInput();
        echo "Connection works delete";
    }
}
