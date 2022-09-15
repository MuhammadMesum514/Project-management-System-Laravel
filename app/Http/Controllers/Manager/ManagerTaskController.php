<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ManagerTaskController extends Controller
{
    public function index($projectId){
        return view('dashboard.manager.ManagerTasks',compact('projectId'));
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
