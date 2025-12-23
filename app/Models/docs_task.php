<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docs_task extends Model
{
    use HasFactory;

    protected $table = 'docs_tasks';

    protected $fillable = ['task_id','name_doc', 'path'];

    public function tasks()
    {
        return $this->belongsTo(tasks::class, 'task_id');
    }
}
