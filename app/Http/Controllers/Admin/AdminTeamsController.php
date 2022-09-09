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
}
