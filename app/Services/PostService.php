<?php 
namespace App\Services;

use App\Contracts\PostContract;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostService implements PostContract {

	public function updatePost($postData,$user_id)
	{
		$post = Post::where('id', $postData['post_id'])->first();

        //checks if the Authenticated user is able to see the edit post
		if( (!is_null($post)) && Auth::user()->id === intval($user_id) ){

			$post = Post::where('id', $postData['post_id'])

			->update(['post' => $postData['post'] ] );

		}

	}


}







?>