<?php

use Illuminate\Database\Seeder;
use App\UserBiography;
class UsersBiographiesTableSeeder extends Seeder
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
    		UserBiography::create([
    			'user_id' => $i,
    			'biography' => 'Bio Example #'.$i
    		]);
    	}
    }
}
