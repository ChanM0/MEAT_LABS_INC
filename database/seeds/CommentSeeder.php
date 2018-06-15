<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 25; $i++) { 
        	# code...
    		Comment::create([
    			'user_id' => $i,
    			'post_id' => $i,
    			'comment' => 'this is a comment'.$i
    		]);
    	}
    	for ($i=1; $i < 25; $i++) { 
        	# code...
    		Comment::create([
    			'user_id' => $i,
    			'post_id' => $i,
    			'comment' => 'this is a comment'.$i*2
    		]);
    	}
    	for ($i=1; $i < 25; $i++) { 
        	# code...
    		Comment::create([
    			'user_id' => $i,
    			'post_id' => $i,
    			'comment' => 'this is a comment'.$i*3
    		]);
    	}
    }
}
