<?php 

namespace App\Services;

use App\Contracts\CommentContract;

use App\Comment;
use App\User;

// You may access the authenticated user via the Auth facade:
use Illuminate\Support\Facades\Auth;

class CommentService implements CommentContract{

	public function updateComment($commentData,$comment_id){

		$comment = Comment::where('id', $comment_id)->first();

		if( (!is_null($comment))  && Auth::user()->id === intval($commentData['user_id']) ){

			$comment = Comment::where('id', $comment_id)

			->update(['comment' => $commentData['comment'] ] );

		}
		

	}

	public function deleteComment($comment_id){
		$comment = Comment::where('id', $comment_id)->first();

		if(!is_null($comment)){

			$user = User::where('id',$comment->user_id)->first();

			if( !is_null( $user ) && (Auth::user()->id === $user->id || Auth::user()->admin === 1)  ){

				Comment::where('id', $comment_id)->delete();

			}
		}

	}

	public function storeComment($commentData){

		 //make sure you check if the comment is null?
		if(Auth::user()->id === intval($commentData['user_id'])){

			$comment = Comment::create([
				'user_id' => $commentData['user_id'],
				'post_id' => $commentData['post_id'],
				'comment' => $commentData['comment'] 
			]);

		}
		
	}

}




?>