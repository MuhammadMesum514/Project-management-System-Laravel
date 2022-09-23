<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AdminTaskController extends Controller
{
     // * for viewing task details 
     public function getAdminTaskDetails(Request $request){
        $taskId=$request->get('task_details_id');
        $taskDetails= DB::table('tasks')
            ->leftJoin('task_details', 'tasks.task_id', '=', 'task_details.TaskID')
            ->Join('users', 'tasks.AssignedTo', '=', 'users.user_id')
            ->where('tasks.task_id','=',$taskId)
            ->select(['tasks.*','TaskDescription','taskPriority','name'])
            ->get();
            return view('dashboard.admin.adminTaskDetails',compact('taskDetails'));
    }
}
