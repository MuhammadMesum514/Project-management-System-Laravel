<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetails extends Model
{
    use HasFactory;
    
    protected $table = 'task_details';
    protected $primaryKey  = 'id';
    
    protected $fillable = [
        'TaskDescription',
        'taskPriority',
        'TaskID',
    ];

    // * get task for which the task details are accessed
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
