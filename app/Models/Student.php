<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Student extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
    	'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
    	return $this->password;
    }
}
