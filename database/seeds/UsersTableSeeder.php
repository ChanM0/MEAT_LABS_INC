<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	for ($i=1; $i < 50; $i++) { 
        	# code...
    		User::create([
    			'First_Name' => 'Clark'.$i,
    			'Last_Name' => 'Kent'.$i,
    			'username' => 'Username'.$i,
    			'email' => 'example'.$i.'@email.com',
    			'password' => Hash::make('password')
    		]);
    	}
    }
}
