<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class ManagerProjectController extends Controller
{
    public function index(){
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress from projects WHERE projects.TeamID = ?', [Session::get('ManagerTeamID')]);
        // dd($projects);
        return view('dashboard.manager.managerProjects', compact('projects'));
    }

    public function createProject(Request $request){
        dd("working form submission");
    }
}
