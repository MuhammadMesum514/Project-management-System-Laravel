<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey  = 'task_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TaskName',
        'deadline',
        'task_status',
        'is_completed',
        'Completion_percent',
        'ProjectID',
        'AssignedTo',
        'AssignedBy',
    ];

    public function taskDetails()
    {
        return $this->hasOne('App\TaskDetails', 'TaskID');;
    }

}
