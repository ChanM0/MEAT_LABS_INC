<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBiography;
use App\Post;
use App\Comment;

use App\Mail\UserDeletionEmail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\UsernameUpdateRequest;

// You may access the authenticated user via the Auth facade:
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $redirectTo = '/home';

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

        if(!is_null($user)){

            $bio = UserBiography::where('user_id', $user->id )->first();

            $posts = Post::with('comments.author')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

            return view('user.profile',compact('bio','user','posts'));

        }
        
        return redirect()->route('home');

    }

    public function usernameEdit($id)
    {

        $user = User::where('id', $id)->first();

        //checks if the Authenticated user is able to see the edit comment
        if( !is_null( $user ) && Auth::user()->id === $user->id ){

            return view('forms.usernameEditForm',compact('user', 'id' ));

        }

        return redirect()->route('home');

    }

    public function usernameUpdate(UsernameUpdateRequest $request,$user_id)
    {
        
        $user = User::where('id', $user_id)->first();

        if( !is_null( $user ) && Auth::user()->id === $user->id ){

            $user = User::where('id', $user_id)

            ->update(['username' => $request->username]);

            return redirect()->route( 'profile', Auth::user()->email );

        }

        return redirect()->route('home');

    }

    public function delete($user_id)
    {
        $user = User::where('id',$user_id)->first();

        if( !is_null( $user ) && (Auth::user()->id === $user->id || Auth::user()->admin === 1)  ){

            Mail::to($user->email)->send(new UserDeletionEmail($user));

            $user = User::where('id',$user_id)->delete();

        }
        return redirect()->route('home');

    }

    public function makeAdmin($id)
    {
        $user = User::where('id',$id)->first();

        if( !is_null( $user ) && ( Auth::user()->admin === 1)  ){

            $userAfter = User::where('id',$id)->update(['admin'=>1]);

        }

        return back()->withInput();
    }

    public function removeAdmin($id)
    {
        $user = User::where('id',$id)->first();

        if( !is_null( $user ) && ( Auth::user()->admin === 1)  ){

            $userAfter = User::where('id',$id)->update(['admin'=>0]);
        }

        return back()->withInput();

    }
}
