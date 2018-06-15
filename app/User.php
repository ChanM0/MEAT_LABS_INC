<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'First_Name','Last_Name', 'username' ,'email',
    ];
    // protected $fillable = [
    //     'First_Name','Last_Name', 'username' ,'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];
    public function scopeEmail($query,$email){
        return $query->where($email.'@gmail.com');
    }

    
    
}
