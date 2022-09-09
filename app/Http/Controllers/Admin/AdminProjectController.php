<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Project;
use App\Models\Team;
class AdminProjectController extends Controller
{
    public function index($id){
        // dd($id);
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress from projects WHERE projects.TeamID = ?', [$id]);
        // $projects=Project::with('Team')->where('TeamID','=',$id)->get();
        // dd($projects);
        return view('dashboard.admin.teamProjects',compact('projects','id'));
    }

    public function projectDetails($teamId,$projectId){
        $projects=DB::select('select * from projects WHERE projects.project_id = ?', [$projectId]);
        $TeamMembers=DB::select('select users.name as username,managers.name as managername from users inner join user_team on user_team.userID=users.user_id inner join managers on managers.manager_id=(select teamLead from teams where team_id=?)', [$teamId]);
        $managerName=$TeamMembers[0]->managername;
        return view('dashboard.admin.projectDetails', compact('projects','TeamMembers','managerName'));
    }
}
