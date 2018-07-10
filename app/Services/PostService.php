<?php 
namespace App\Services;

use App\Contracts\PostContract;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostService implements PostContract {

	public function updatePost($postData,$user_id)
	{
		$post = Post::where('id', $postData['post_id'])->first();

        //checks if the Authenticated user is able to see the edit post
		if( (!is_null($post)) && Auth::user()->id === intval($user_id) ){

			$post = Post::where('id', $postData['post_id'] )

			->update(['post' => $postData['post'] ] );

		}

	}


	public function deletePost($post_id){

		$post = Post::where('id', $post_id)->first();

		if(!is_null($post)){

			$user = User::where('id',$post->user_id)->first();

			if( !is_null( $user ) && (Auth::user()->id === $user->id || Auth::user()->admin === 1)  ){

				Post::where('id', $post_id)->delete();

			}

		}

	}

	public function storePost($postData,$user_id){

		if(Auth::user()->id === intval($user_id)){

			$post = Post::create([

				'user_id' => $user_id,

				'post' => $postData['post']

			]);

			return back()->withInput();

		}
	}


}







?>