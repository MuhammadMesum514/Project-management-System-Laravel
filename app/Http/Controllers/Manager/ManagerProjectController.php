<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;


class ManagerProjectController extends Controller
{
    public function index(){
        $projects=DB::select('select project_id as project_id, ProjectName,ProjectDescription,End,progress from projects WHERE projects.TeamID = ?', [Session::get('ManagerTeamID')]);
        // dd($projects);
        return view('dashboard.manager.managerProjects', compact('projects'));
    }

    // * For creating new projects
    public function createProject(Request $request){
           
        $projectInfo=Validator::make($request->all(),[
            'project_Name' => 'required',
            'project_StartDate' => 'required',
            'project_EndDate' => 'required',
            'project_description' => 'required|string',
            
        ]);

        if ($projectInfo->fails()) {
            return \Redirect::back()->withInput()->withErrors($projectInfo);
        } 
        else{
            $projectInfo=[
                'ProjectName' => $request->get('project_Name'),
                'start' => Carbon::createFromFormat('d/m/Y', $request->get('project_StartDate'))->format('Y-m-d'),
                'End'   =>   Carbon::createFromFormat('d/m/Y', $request->get('project_EndDate'))->format('Y-m-d'),
                'ProjectDescription' => $request->get('project_description'),
                'is_completed' => 0,
                'status' => "New",
                'progress' => 0,
                'TeamID' => Session::get('ManagerTeamID'),
                'created_at' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d'),
            ];
           }
           try{
            DB::table('projects')->insert($projectInfo);

            return redirect()->back()->with('status',"Project Created Sucessfully");
          }
          catch(exception $e){
            return redirect()->back()->with('error',"Failed to Create Project");
          }
}

    //* for updating a project 
    public function updateProject(Request $request){
            // dd($request->all());

            try{
                if($request->get('completed')){
                    Project::where('project_id', $request->get('project_id'))
                    ->update([
                   'ProjectName' => $request->get('project_Name'),
                   'start' => Carbon::createFromFormat('d/m/Y', $request->get('project_StartDate'))->format('Y-m-d'),
                   'End' => Carbon::createFromFormat('d/m/Y', $request->get('project_EndDate'))->format('Y-m-d'),
                   'progress' => 100,
                   'is_completed' => 1,
                   'status' => 'Done',
                   'ProjectDescription' => $request->get('project_description'),
                   'updated_at' => Carbon::now()->format('Y-m-d'),
                    ]);
    
                }
                else{
                    Project::where('project_id', $request->get('project_id'))
                    ->update([
                   'ProjectName' => $request->get('project_Name'),
                   'start' => Carbon::createFromFormat('d/m/Y', $request->get('project_StartDate'))->format('Y-m-d'),
                   'End' => Carbon::createFromFormat('d/m/Y', $request->get('project_EndDate'))->format('Y-m-d'),
                   'progress' => $request->get('progress'),
                   'is_completed' => 0,
                   'status' => $request->get('status'),
                   'ProjectDescription' => $request->get('project_description'),
                   'updated_at' => Carbon::now()->format('Y-m-d'),
                    ]);
                }
                return redirect()->back()->with('status',"Project Successfully Updated");
              }
              catch(exception $e){
                return redirect()->back()->with('error',"Failed to Update Project");
              }


            
           
    }

    // * For Deleting a Project
    public function deleteProject(Request $request){
        try{
            DB::table('projects')->where('project_id',$request->dlt_id)
            ->delete();
            return redirect()->back()->with('status',"Updated Record Sucessfully");
          }
          catch(exception $e){
            return redirect()->back()->with('error',"Failed to Update Record");
          }
    }

    // * ajax for editing a project 
    public function edit($id ,Request $request){
        if($request->ajax()){
            $result=Project::find($id);
            return response()->json([
                'status' => 200,
                'project' => $result,
            ]);
        }
    }
}