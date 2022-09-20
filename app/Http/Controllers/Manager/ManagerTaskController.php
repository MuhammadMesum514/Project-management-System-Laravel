<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskDetails;
use \Crypt;
use Auth;

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

    // * get task which is required to be edited using Ajax
    public function editTasks($id,Request $request){
        if($request->ajax()){
            $editableTask= DB::table('tasks')
            ->leftJoin('task_details', 'tasks.task_id', '=', 'task_details.TaskID')
            ->Join('users', 'tasks.AssignedTo', '=', 'users.user_id')
            ->where('tasks.task_id','=',$id)
            ->select(['tasks.*','TaskDescription','taskPriority','name'])
            ->get();
            return json_encode($editableTask); 
            // response()->json(
            // [
            //     'status' => 200,
            //     'task' => $editableTask,
            // ]);
        
    }
    }

    // * for creating a new task
    public function createTask(Request $request){
        // dd($request->all());
        $taskInfo=Validator::make($request->all(),[
            'task_name' => 'required',
            'task_description' => 'required',
            'task_deadline' => 'required',
            'task_Priority' => 'required|string',
            'assigned_to' => 'required',
        ]);

        if ($taskInfo->fails()) {
            return \Redirect::back()->withInput()->withErrors($taskInfo);
        }
           
        try {
            $task =new Task();
            $task->TaskName= $request->get('task_name'); 
            $task->deadline=Carbon::createFromFormat('d/m/Y', $request->get('task_deadline'))->format('Y-m-d'); 
            $task->task_status= "New"; 
            $task->is_completed= 0; 
            $task->Completion_percent= 0; 
            $task->ProjectID= $request->get('projectId'); 
            $task->AssignedTo= $request->get('assigned_to'); 
            $task->AssignedBy= Auth::user()->manager_id; 
            $task->save();
            $taskId=$task->task_id;

            // * for task details insertion
            $taskDetails=[
                'TaskDescription' =>  $request->get('task_description'),       
                'taskPriority' =>  $request->get('task_Priority'),
                'TaskID' => $taskId,
                'created_at' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d'),
            ];
            DB::table('task_details')->insert($taskDetails);
            return redirect()->back()->with('status',"New task created Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',`failed to create new record $th`);
        }
        
    }

    // * for updating a task
    public function updateTask(Request $request){
        $editTask=Validator::make($request->all(),[
            'edit_taskname' => 'required',
            'edit_task_description' => 'required',
            'edit_task_deadline' => 'required',
            'hiddenEditAssignedTo' => 'required|string',
            'hiddenEditPriority' => 'required|string',
            'hiddenEditStatus' => 'required|string',
            'edit_completion_Percent' => 'required|min:0|max:100',
            'edit_completed' => 'required|Boolean',
        ]);

        if ($editTask->fails()) {
            return \Redirect::back()->withInput()->withErrors($editTask);
        }
        else
        {
            $editTaskPriority = $request->get('edit_task_Priority')?$request->get('edit_task_Priority'):$request->get('hiddenEditPriority');
            $editTaskStatus = $request->get('edit_task_status')?$request->get('edit_task_status'):$request->get('hiddenEditStatus');
            $editAssignedTo = $request->get('edit_assigned_to')?$request->get('edit_assigned_to'):$request->get('hiddenEditAssignedTo');
            $taskId=$request->get('edit_task_id');

            $completion_percent=$request->get('edit_completed')==1?'100':$request->get('edit_completion_Percent');
            if($completion_percent==100){$editTaskStatus ='Done';}
            try {
                // * for task details insertion
            $editTask=[
                'TaskName' =>  $request->get('edit_taskname'),       
                'deadline' =>  Carbon::createFromFormat('d/m/Y', $request->get('edit_task_deadline'))->format('Y-m-d'),
                'task_status' => $editTaskStatus,
                'is_completed' => $request->get('edit_completed'),
                'Completion_percent' => $completion_percent,
                'AssignedTo ' => $editAssignedTo,
                'updated_at' => Carbon::now()->format('Y-m-d'),
            ];
            DB::table('tasks')->where('task_id','=',$taskId)->update($editTask); 
            $editTaskDetailsInfo=[
                'TaskDescription' =>  $request->get('edit_task_description'),       
                'taskPriority' =>  $editTaskPriority,
                'TaskID' => $taskId,
                'updated_at' => Carbon::now()->format('Y-m-d'),
            ];
            DB::table('task_details')->update($taskDetails);

            return redirect()->back()->with('status',"New task created Successfully");
            } catch (\Throwable $th) {
                return redirect()->back()->with('error',`failed to create new record $th`);
            }
        }
    }
    //  * for viewing task details 
    public function managertaskDetails(Request $request){
        $taskId=$request->get('task_details_id');
        $taskDetails=DB::select('select * from tasks inner join task_details on tasks.task_id=task_details.TaskID  where tasks.task_id=?', [$taskId]);
        dd($taskDetails);
    }

    
}
