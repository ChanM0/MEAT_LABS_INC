<?php 
namespace App\Contracts;

interface CommentContract {

	public function updateComment($commentData,$comment_id);
	
	public function deleteComment($comment_id);
	
	public function storeComment($commentData);



}



 ?>