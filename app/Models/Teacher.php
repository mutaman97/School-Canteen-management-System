<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Teacher extends Model
{
    protected $table = 'students';

    protected $guarded = ['id'];

    protected $hidden = [
    	'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
    	return $this->password;
    }
}
