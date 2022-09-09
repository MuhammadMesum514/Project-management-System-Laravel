<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $primaryKey  = 'team_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teamName',
        'teamLead',
    ];

    public function User()
    {
        return $this->belongsToMany(User::class, 'user_team','teamID','userID');
    }

    public function Project()
    {
        return $this->hasMany(Project::class);
    }
}
