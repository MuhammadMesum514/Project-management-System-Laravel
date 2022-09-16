<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use \Crypt;

class ManagerTaskController extends Controller
{

    
    public function index($projectId){
        $projectId=Crypt::decrypt($projectId);
        $total=0; $Completed=0; $New=0; $OnHold=0; $InProgress=0;
        $taskCounts = DB::select('CALL Get_All_Task_Count_On_Status_Based_On_Project(?)',[$projectId]);
        if($taskCounts){
            $total = $taskCounts[0]->total?$taskCounts[0]->total:0;
            $Completed = $taskCounts[0]->Completed?$taskCounts[0]->Completed:0;
            $New = $taskCounts[0]->New?$taskCounts[0]->New:0;
            $OnHold = $taskCounts[0]->OnHold?$taskCounts[0]->OnHold:0;
            $InProgress = $taskCounts[0]->InProgress?$taskCounts[0]->InProgress:0;
        }

        $data=compact('total', 'Completed', 'New', 'OnHold', 'InProgress', 'projectId');
        return view('dashboard.manager.ManagerTasks')->with($data);
    }

    //* Ajax for getting Assigned To
    public function getAssignedTo(Request $request){
        if ($request->ajax()){
            $teamMembers = DB::select('select user_id,name from users inner join user_team on users.user_id=user_team.userID where user_team.teamID=?', [Session::get('ManagerTeamID')]);
            return json_encode($teamMembers);
            }
    }

    // * GET AJAX tasks based on count
    public function getTasks($id,Request $request){
        
        if($request->ajax()){
            $taskProjectId=$request->get('projectId');
            switch ($id) {
                case 'total':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->get());
                    break;
                case 'New':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "New")                  
                    ->get());
                    break;
                
                case 'Completed':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "Done")
                    ->get());
                    break;
                    
                case 'inProgress':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "In Progress")
                    ->get());
                    break;
                    
                case 'onHold':
                   return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                    ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                    ->where('tasks.ProjectID','=',$taskProjectId)
                    ->where('task_status','=', "On Hold")
                    ->get());
                    break;
                
                default:
                return json_encode(DB::table('tasks')->leftJoin('users', 'users.user_id', '=','tasks.AssignedTo')
                ->select('tasks.task_id', 'tasks.TaskName','tasks.deadline', 'tasks.task_status','tasks.Completion_percent','users.name')
                ->where('tasks.ProjectID','=',$taskProjectId)
                ->get());
                    break;
            }
        }
    }

    public function createTask(){
        dd("creating task");   
    }
}
