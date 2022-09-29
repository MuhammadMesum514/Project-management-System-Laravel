@php 
$img=(string)rand(1,30);
$imgPath="assets/img/profiles/avatar-$img.jpg";
@endphp

{{-- it will be dashboard page for user --}}
@extends('layouts.adminBaseLayout.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<style>
    .project_description {
        color: red !important;
       
    }

</style>
@endsection

@section('header')
@include('layouts.adminBaseLayout.header')
@endsection


@section('sidebar')
@include('layouts.adminBaseLayout.sidebar')
@endsection

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    {{-- FOR CHECKING ERRORS --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <!-- Page Content -->
    <div class="content container-fluid">
	
     
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{$projects[0]->ProjectName}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Project</li>
                    </ul>
                </div>
                {{-- <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
                    <a href="task-board.html" class="btn btn-white float-right m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
                </div> --}}
            </div>
        </div>
        
        <!-- /Page Header -->

{{-- Hidden Fields --}}
<input type="hidden" name="hiddenProjectId" id="hiddenProjectId" value="{{$projects[0]->project_id}}">
{{-- submit task ID to get task Details  --}}
<form id="getAdminTaskDetails" method="POST" action="{{ route('admin.admintasksdetails') }}">
    @csrf
    <input type="hidden" id="AdmintaskDetailsId" name="task_details_id">
</form>
{{-- Hidden Fields --}}


        <div class="row">
            @foreach ($projects as $project)
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="project-title">
                            <h5 class="card-title">{{$project->ProjectName}}</h5>
                            {{-- <small class="block text-ellipsis m-b-15"><span class="text-xs">2</span> <span class="text-muted">open tasks, </span><span class="text-xs">5</span> <span class="text-muted">tasks completed</span></small> --}}
                        </div>
                        <p>{{$project->ProjectDescription}}</p>
                    </div>
                </div>
                
                <div class="project-task">
                    <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                        <li class="nav-item"><a class="nav-link active" href="#all_tasks" onclick="getAllTasksOfProject('All')" data-toggle="tab" aria-expanded="true">All Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pending_tasks" onclick="getAllTasksOfProject('Pending')" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#completed_tasks" onclick="getAllTasksOfProject('Done')" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
                    </ul>



                    <div class="tab-content">
                        <div class="tab-pane show active" id="all_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            <li class="task allTaskContainer" id="allTaskContainer">
                                             
                                            </li>
                                       
                                         
                                        </ul>
                                    </div>
                                    <div class="task-list-footer">
                                        <div class="new-task-wrapper">
                                            <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                            <span class="error-message hidden">You need to enter a task first</span>
                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                            <span class="btn" id="close-task-panel">Close</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pending_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            <li class="task allTaskContainer" id="allTaskContainer">
                                                <div class="task-container">
                                                    <span class="task-action-btn task-check mr-2">
                                                      
                                                    </span>
                                                    <a href="#"><span class="task-label" contenteditable="false">Patient appointment booking</span></a>
                                                  
                                                </div>
                                            </li>
                                         
                                            {{-- <li class="completed task">
                                                <div class="task-container">
                                                    <span class="task-action-btn task-check">
                                                        <span class="action-circle large complete-btn" title="Mark Complete">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    </span>
                                                    <span class="task-label">Doctor available module</span>
                                                    <span class="task-action-btn task-btn-right">
                                                        <span class="action-circle large" title="Assign">
                                                            <i class="material-icons">person_add</i>
                                                        </span>
                                                        <span class="action-circle large delete-btn" title="Delete Task">
                                                            <i class="material-icons">delete</i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </li> --}}
                                         
                                        </ul>
                                    </div>
                                    <div class="task-list-footer">
                                        <div class="new-task-wrapper">
                                            <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                            <span class="error-message hidden">You need to enter a task first</span>
                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                            <span class="btn" id="close-task-panel">Close</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="completed_tasks">
                            <div class="task-wrapper">
                                <div class="task-list-container">
                                    <div class="task-list-body">
                                        <ul id="task-list">
                                            <li class="task allTaskContainer" id="allTaskContainer">
                                                <div class="task-container">
                                                    <span class="task-action-btn task-check mr-2">
                                                      
                                                    </span>
                                                    <a href="#"><span class="task-label" contenteditable="false">Patient appointment booking</span></a>
                                                  
                                                </div>
                                            </li>
                                         
                                        </ul>
                                    </div>
                                    <div class="task-list-footer">
                                        <div class="new-task-wrapper">
                                            <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                            <span class="error-message hidden">You need to enter a task first</span>
                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                            <span class="btn" id="close-task-panel">Close</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title m-b-15">Project details</h6>
                        <table class="table table-striped table-border">
                            <tbody>
                                <tr>
                                    <td>Created:</td>
                                    <td class="text-right">{{\Carbon\Carbon::createFromFormat('Y-m-d', $project->start)->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Deadline:</td>
                                    <td class="text-right">{{\Carbon\Carbon::createFromFormat('Y-m-d', $project->End)->format('d M Y')}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Status:</td>
                                    <td class="text-right">{{$project->status}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="m-b-5">Progress <span class="text-success float-right">{{$project->progress}}%</span></p>
                    <progress id="file" class="progress progress-xs mb-0 w-100" value="{{$project->progress}}" max="100"> {{$project->progress}}% </progress>
                    </div>
                </div>
                <div class="card project-user">
                    <div class="card-body">
                        <h6 class="card-title m-b-20">Team Leader</h6>
                        <ul class="list-box">
                            <li>
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar"><img alt="" src="{{url($imgPath)}}"></span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">{{$managerName[0]->managername}}</span>
                                        </div>
                                    </div>
                            </li>
                            <li>
                                
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card project-user">
                    <div class="card-body">
                        <h6 class="card-title m-b-20">
                            Team Members 
                        </h6>
                        <ul class="list-box">
                            @foreach ($TeamMembers as $teamMember)
                            @php 
                            $img=(string)rand(1,30);
                            $imgPath="assets/img/profiles/avatar-$img.jpg";
                            @endphp
                            
                            <li>
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar"><img alt="" src="{{url($imgPath)}}"></span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">{{$teamMember->username}}</span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /Page Content -->


</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')
{{-- getting task details on Page load --}}
<script>
    $(document).ready(function () {
        getAllTasksOfProject('All');
    });
</script>
{{-- Admin form submission to get task Details --}}
<script>
    function adminSubmitTaskDetailsForm(id){
        $('#AdmintaskDetailsId').val(id);
        $('#getAdminTaskDetails').submit();
    }
</script>

{{-- method for getting task details --}}
<script>
    function getAllTasksOfProject(status){
        var url = "{{ route('admin.getAllTasksOfProject', ":id") }}";
        url = url.replace(':id', status);
		var project_id = $('#hiddenProjectId').val();
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
        type: 'GET'
        , url: url,
		data:{'hiddenProjectId':project_id}
        , success: function(response) {
            $('.allTaskContainer').empty();
            response=JSON.parse(response);
            response.forEach(element => {
                // $('#allTaskContainer').append('<span class="task-action-btn task-check mr-2"></span><a href="#"><span class="task-label" contenteditable="false">'+element.TaskName+'</span></a><br>')
                $('.allTaskContainer').append('<div class="task-container"><span class="task-action-btn task-check mr-2"></span><a href="#" onclick= "adminSubmitTaskDetailsForm('+element.task_id+')"" ><span class="task-label" contenteditable="false">'+element.TaskName+'</span></a></div>');
            });
        }                                      
        });
        }
</script>
@endsection
