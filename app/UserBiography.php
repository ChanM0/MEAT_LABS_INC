<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBiography extends Model
{
    //
    protected $fillable = [
        'user_id','biography',
    ];
	protected $hidden = [
		'id','created_at','updated_at',
	];
}
