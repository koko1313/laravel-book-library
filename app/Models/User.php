<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['facultyNum','fname','lname', 'password', 'email', 'is_admin'];
}
