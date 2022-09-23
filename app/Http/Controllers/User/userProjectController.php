<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Crypt;
class userProjectController extends Controller
{
    // * get Projects for a user
    public function getProjects(Request $request){
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress,projects.TeamID from projects inner join user_team on projects.TeamID = user_team.teamID where user_team.userID= ?',[Auth::user()->user_id]);
        return view('dashboard.user.userProject',compact('projects'));
    }

    // * for getting task details about a Project
    public function userProjectDetails($projectId){
        $projectId=Crypt::decrypt($projectId);
        $total=0; $Completed=0; $New=0; $OnHold=0; $InProgress=0;
        $taskCounts = DB::select('CALL Get_All_Task_Count_On_Status_Based_On_Project_For_A_User(?,?)',[$projectId,Auth::user()->user_id]);
        if($taskCounts){
            $total = $taskCounts[0]->total?$taskCounts[0]->total:0;
            $Completed = $taskCounts[0]->Completed?$taskCounts[0]->Completed:0;
            $New = $taskCounts[0]->New?$taskCounts[0]->New:0;
            $OnHold = $taskCounts[0]->OnHold?$taskCounts[0]->OnHold:0;
            $InProgress = $taskCounts[0]->InProgress?$taskCounts[0]->InProgress:0;
        }

        $data=compact('total', 'Completed', 'New', 'OnHold', 'InProgress', 'projectId');
        return view('dashboard.user.userTask')->with($data);
    }

     // * GET AJAX tasks based on count
     public function ajaxGetUserTasks($id,Request $request){
        
        if($request->ajax()){
            $taskProjectId=$request->get('projectId');
            switch ($id) {
                case 'total':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                    ->get());
                    break;
                case 'New':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "New")
                    ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                    ->get());
                    break;
                
                case 'Completed':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "Done")
                    ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                    ->get());
                    break;
                    
                case 'inProgress':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "In Progress")
                    ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                    ->get());
                    break;
                    
                case 'onHold':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "On Hold")
                    ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                    ->get());
                    break;
                
                default:
                return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                ->where('tasks.ProjectID','=',$taskProjectId)
                ->where('tasks.AssignedTo','=',Auth::user()->user_id)
                ->get());
                    break;
            }
        }
    }
}
