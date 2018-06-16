<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Comment extends Pivot
{
    public function author()
    {
    	//relate to user
    	return $this->hasOne('App\User','id','user_id');
    }

    
}

