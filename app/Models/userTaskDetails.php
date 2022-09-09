<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTaskDetails extends Model
{
    use HasFactory;

    protected $table = 'user_task_details';
    // protected $primaryKey  = 'team_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_completed',
        'status',
        'Completion_percent',
        'TaskID',
    ];

}
