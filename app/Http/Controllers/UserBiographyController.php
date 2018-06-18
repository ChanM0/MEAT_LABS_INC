<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserBiography;
use App\User;

// You may access the authenticated user via the Auth facade:
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserBiopgraphyUpdateRequest;

class UserBiographyController extends Controller
{
    //able to make sure only people edit there own bio
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function delete($user_id)
    {
        $user = User::where('id',$user_id)->first();

        if( (!is_null( $user )) && (Auth::user()->id === $user->id) ){

            $bioUpdate = UserBiography::where('user_id', $user_id)

            ->update(['biography' => '']);

            return redirect()->route( 'profile', [$user->email] );

        }

        return redirect()->route('home');

    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($user_id)
     {

        $user = User::where('id',$user_id)->first();

        if(!is_null($user)){

            $userBio = UserBiography::where('user_id', $user_id)->first();

            //checks if the Authenticated user is able to see the edit post
            if(  Auth::user()->id === $userBio->user_id ){

                return view('forms.editBioForm',compact('userBio','user_id'));

            }
            
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
    public function update(UserBiopgraphyUpdateRequest $request, $user_id)
    {
        
        $user = User::where('id',$user_id)->first();

        if( (!is_null( $user )) && (Auth::user()->id === $user->id) ){

            $bioUpdate = UserBiography::where('user_id', $user_id)

            ->update(['biography' => $request->biography]);

            return redirect()->route( 'profile', [$user->email] );

        }

        return redirect()->route('home');

    }
}
