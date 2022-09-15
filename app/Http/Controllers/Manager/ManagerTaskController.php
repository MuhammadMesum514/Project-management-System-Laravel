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

    public function createTask(){
        dd("creating task");   
    }
}
