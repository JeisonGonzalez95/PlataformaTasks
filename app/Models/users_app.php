<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_app extends Model
{
    protected $table = 'users_app';
    protected $fillable = ['fullname', 'email', 'username', 'password', 'state'];
}

