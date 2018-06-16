<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserBiography;
use App\User;

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
        // return $id;
        $userBio = UserBiography::where('user_id', $id)->first();
        return view('forms.editBioForm',compact('userBio','id'));
        // return redirect()->route( 'profile', [$request->email] ); 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //make sure you check if the comment is null?
        echo "Connection works store";
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
        //return $id;
        echo "Connection works destroy";
    }
}
