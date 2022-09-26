<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMessage extends Model
{
    use HasFactory;
    protected $table = 'task_messages';
    protected $primaryKey  = 'message_id';
    
    protected $fillable = [
        'MessageBody',
        'senderName',
        'TaskID',
    ];
}
