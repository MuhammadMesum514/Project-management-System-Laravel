<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Team;

class AdminTeamsController extends Controller
{
    public function teams(Request $request){
        $teams = DB::select('select team_id,TeamName,managers.name as teamLeadName, managers.designation as managerDesignation from teams inner join managers on teams.teamLead = managers.manager_id');
        if($request->ajax()){
            $managers=DB::select('select managers.manager_id,managers.name from managers');
            return json_encode($managers);
        }
        // dd($teams);
        return view('dashboard.admin.teams',compact('teams'));
    }

    // for creating a team
    public function createTeam(Request $request){
        // dd($request->all());
        $teams= new Team();
        $teams->teamName=$request->team_name;
        $teams->teamLead=$request->teamLead;
        $teams->save();
        $teams->User()->sync($request->teamMembers);
       
        return redirect()->back()->with('status','Team Created Successfully');
    }
// FOR Deleting A team
    public function deleteTeam(Request $request){
        DB::table('teams')->where('team_id', '=', $request->dlt_id)->delete();
        return redirect()->back()->with('status','Team Created Successfully');
    }

    // Ajax for fetching team members information
    public function getTeamMembers(Request $request){

        if($request->ajax()){
            $members=DB::select('select users.user_id,users.name from users');
            return json_encode($members);
        }

    }

    public function getAllTasksOfProject($status='All', Request $request){
        $projectId=$request->get('hiddenProjectId');
        // dd($projectId);
        if($request->ajax()){
            switch ($status) {
                case 'Pending':
                    $taskList=DB::select('select task_id,TaskName from tasks where tasks.ProjectID = ? and tasks.task_status!="Done"', [$projectId]);
                    
                    break;

                case 'Done':
                    $taskList=DB::select('select task_id,TaskName from tasks where tasks.ProjectID = ? and tasks.task_status="Done"', [$projectId]);
                    break;
                    
                case 'All':
                    $taskList=DB::select('select task_id,TaskName from tasks where tasks.ProjectID = ?', [$projectId]);
                    break;
                    
                    default:
                    $taskList=DB::select('select task_id,TaskName from tasks where tasks.ProjectID = ?', [$projectId]);
                    // $taskList=DB::select('select task_id,TaskName from tasks where tasks.ProjectID = ? and tasks.task_status="Done"', [$projectId]);
                    break;
            }
            return json_encode($taskList);
        }

    }
}
