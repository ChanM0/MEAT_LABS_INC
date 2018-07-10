<?php 
namespace App\Contracts;

interface PostContract{

	public function updatePost($postData,$user_id);

	public function deletePost($post_id);
	
	public function storePost($postData,$user_id);
	



	


}


 ?>