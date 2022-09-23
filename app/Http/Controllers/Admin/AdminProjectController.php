<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Project;
use App\Models\Team;
class AdminProjectController extends Controller
{
    // * for getting all projects
    public function index(){
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress,TeamID from projects');
        return view('dashboard.admin.adminAllProjects',compact('projects'));
    }
    // * for getting projects base on Team ID
    public function teamProjects($id){
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress from projects WHERE projects.TeamID = ?', [$id]);
        return view('dashboard.admin.teamProjects',compact('projects','id'));
    }
    
    public function projectDetails($teamId,$projectId){
        $projects=DB::select('select * from projects WHERE projects.project_id = ?', [$projectId]);
        $TeamMembers=DB::select('select users.name as username from users inner join user_team on user_team.userID=users.user_id where user_team.teamID = ?', [$teamId]);
        $managerName=DB::select('select  managers.name as managername from managers inner join teams on managers.manager_id=teams.teamLead where teams.team_id=?', [$teamId]);
        return view('dashboard.admin.projectDetails', compact('projects','TeamMembers','managerName'));
    }
}
