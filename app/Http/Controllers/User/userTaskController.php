<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
use DB;
use Carbon\Carbon;

class userTaskController extends Controller
{
    // * FOR SHOWING TASK DETAILS TO USER
    public function index(Request $request){
        $taskId=$request->get('task_details_id');
        if(!$taskId) return;
        $taskDetails= DB::table('tasks')
            ->leftJoin('task_details', 'tasks.task_id', '=', 'task_details.TaskID')
            ->Join('users', 'tasks.AssignedTo', '=', 'users.user_id')
            ->where('tasks.task_id','=',$taskId)
            ->where('tasks.AssignedTo','=',Auth::user()->user_id)
            ->select(['tasks.*','TaskDescription','taskPriority','name'])
            ->get();
            return view('dashboard.user.userTaskDetails',compact('taskDetails'));
    }

     // * for marking a task as completed on task details page
     public function userMarkAsComplete($completion_flag,Request $request){
        if($request->ajax()){
            $hiddenTaskDetailId=$request->get('hiddenTaskDetailId');
            $updateTask=Task::find($hiddenTaskDetailId);
            if($completion_flag){
                $updateTask->is_completed=1;
                $updateTask->task_status="Done";
                $updateTask->Completion_percent=100;
                $updateTask->updated_at=Carbon::now()->format('Y-m-d');
                $updateTask->save();
            }
            else{
                $updateTask->is_completed=0;
                $updateTask->task_status="In Progress";
                $updateTask->Completion_percent=50;
                $updateTask->updated_at=Carbon::now()->format('Y-m-d');
                $updateTask->save();
            }
            $message = array('message' => 'Success!', 'title' => 'Deleted');
            return response()->json($message);
        }
    }

    //* Ajax to get data for editing a task
    public function userEditTask($id, Request $request){
        if($request->ajax()){
            $editableTask= DB::table('tasks')
            ->leftJoin('task_details', 'tasks.task_id', '=', 'task_details.TaskID')
            // ->Join('users', 'tasks.AssignedTo', '=', 'users.user_id')
            ->where('tasks.task_id','=',$id)
            ->select(['task_id','Completion_percent','task_status','is_completed'])
            ->get();
            return json_encode($editableTask); 
    }
    }
    
    //* upadting a task by user 
    public function userUpdateTask(Request $request){
        $editTask=Validator::make($request->all(),[
            'hiddenEditStatus' => 'required|string',
            'edit_completion_Percent' => 'required|min:0|max:100',
            'edit_completed' => 'required|Boolean',
        ]);

        if ($editTask->fails()) {
            return \Redirect::back()->withInput()->withErrors($editTask);
        }
        else
        {
            $editTaskStatus = $request->get('edit_task_status')?$request->get('edit_task_status'):$request->get('hiddenEditStatus');
            $taskId=$request->get('edit_task_id');
                // dd($taskId);
            $completion_percent=$request->get('edit_completed')==1?'100':$request->get('edit_completion_Percent');
            if($completion_percent==100){$editTaskStatus ='Done';}
            try {
                // * for task details insertion
          
            $editTask=Task::find($taskId);
            $editTask->task_status = $editTaskStatus;
            $editTask->is_completed = $request->get('edit_completed');
            $editTask->Completion_percent = $completion_percent;
            $editTask->save();
            return redirect()->back()->with('status',"Updated Task Successfully");
            } catch (\Throwable $th) {
                return redirect()->back()->with('error',`failed to create new record $th`);
            }
        }
    }

   
}
