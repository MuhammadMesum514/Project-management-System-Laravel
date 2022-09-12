<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class ManagerDashboardController extends Controller
{
   public function index(Request $request){
    // dd("hello world");
      $teamId=DB::select('select team_id from teams where teams.TeamLead = ?', [Auth::user()->manager_id]);
      $teamId=$teamId[0]->team_id;
      if($teamId && !Session::get('ManagerTeamID')){
            Session::put('ManagerTeamID', $teamId);
      }
      $teamMembers=DB::select('select users.name,users.department,users.designation from users inner join user_team on users.user_id=user_team.userID where user_team.teamID =?', [$teamId]);
      return view('dashboard.manager.dashboard',compact('teamMembers'));
   }
}
