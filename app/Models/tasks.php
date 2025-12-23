<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'priority_id', 'state'];

    public function usersApp()
    {
        return $this->belongsTo(users_app::class, 'user_id');
    }
    public function priority()
    {
        return $this->belongsTo(priority::class, 'priority_id');
    }
}
