<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey  = 'project_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projectName',
        'start',
        'End',
        'ProjectDescription',
        'is_completed',
        'status',
        'progress',
        'TeamID',
    ];

    public function Team()
    {
        return $this->BelongsTo(Team::class);
    }
}
