<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserBiography;
use App\User;

// You may access the authenticated user via the Auth facade:
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBiographyController extends Controller
{
    //able to make sure only people edit there own bio
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function delete($id)
    {
        $bioUpdate = UserBiography::where('user_id', $id)
                    ->update(['biography' => '']);
        $user = User::where('id',$id)->first();
        return redirect()->route( 'profile', [$user->email] );
        echo "Connection works delete";
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
        $userBio = UserBiography::where('user_id', $id)->first();
        
        //checks if the Authenticated user is able to see the edit post
        if( Auth::user()->id === $userBio->user_id ){
            
            return view('forms.editBioForm',compact('userBio','id'));
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
    public function update(Request $request)
    {
        $bioUpdate = UserBiography::where('user_id', $request->user_id)
        ->update(['biography' => $request->biography]);
        $user = User::where('id',$request->user_id)->first();
        return redirect()->route( 'profile', [$user->email] );
    }
}
