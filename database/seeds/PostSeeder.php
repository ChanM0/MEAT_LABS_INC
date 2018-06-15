<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	for ($i=1; $i < 25; $i++) { 
        	# code...
    		Post::create([
    			'user_id' => $i,
    			'post' => 'PostExample: '.$i
    		]);
    	}

    	for ($i=1; $i < 25; $i++) { 
        	# code...
    		Post::create([
    			'user_id' => $i,
    			'post' => 'PostExample: '.$i
    		]);
    	}

    }
}
