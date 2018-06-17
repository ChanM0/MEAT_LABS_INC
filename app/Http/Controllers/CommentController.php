<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

// You may access the authenticated user via the Auth facade:
// use Illuminate\Http\Request;
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
        // return $comment;

        //checks if the Authenticated user is able to see the edit comment
        if( Auth::user()->id === $comment->user_id ){
            // return ['status'=>'true'];
            return view('forms.commentEditForm',compact('comment'));
        }
        else{
            // return ['status'=>'false'];
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
    public function update(Request $request)
    {
        // return $request;
        if( Auth::user()->id === intval($request->user_id) ){
            $comment = Comment::where('user_id', $request->user_id)
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "Connection works Index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "Connection works Create";
        
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
        echo "Connection works show";
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
        echo "Connection works destroy";
    }
}
