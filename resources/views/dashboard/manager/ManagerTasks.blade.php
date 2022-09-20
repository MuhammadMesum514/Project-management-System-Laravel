{{-- it will be dashboard page for user --}}
@extends('layouts.managerBaseLayout.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection

@section('header')
@include('layouts.managerBaseLayout.header')
@endsection


@section('sidebar')
@include('layouts.managerBaseLayout.sidebar')
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
                    <h3 class="page-title">Projects</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" id="create-new-task" data-target="#create_task"><i class="fa fa-plus"></i> Create New Task</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        {{-- Task Count Overview --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card-group m-b-30">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">Total Tasks</span>
                                </div>
                               
                            </div>
                           <a id="total" class="getTasksfromCount" href="#"><h3 class="mb-3 text-danger">{{$total}}</h3></a>
                          
                        </div>
                    </div>
                
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">Completed</span>
                                </div>
                              
                            </div>
                       <a id="Completed" class="getTasksfromCount"  href="#"><h3 class="mb-3 text-success">{{$Completed}}</h3></a>
                          
                        </div>
                    </div>
                
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">New</span>
                                </div>
                              
                            </div>
                           <a id="New" class="getTasksfromCount" href="#"><h3 class="mb-3 text-primary">{{$New}}</h3></a>
                           
                        </div>
                    </div>
                
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">In Progress</span>
                                </div>
                               
                            </div>
                       <a id="inProgress" class="getTasksfromCount" href="#"><h3 class="mb-3 text-info">{{$InProgress}}</h3></a>
                            
                        </div>
                    </div> 
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block ">On Hold</span>
                                </div>
                               
                            </div>
                           <a id="onHold" class="getTasksfromCount" href="#"><h3 class="mb-3" style="color: rgb(199, 132, 8);">{{$OnHold}}</h3></a>
                            
                        </div>
                    </div>
                </div>
                <input type="hidden" id="taskProjectID" value="{{$projectId}}" name="taskProjectID"/>
            </div>	
        </div>
        
        {{-- Task Count Overview --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">
                        
                        {{-- submit task ID to get task Details  --}}
                        <form id="getTaskDetails" method="POST" action="{{ route('manager.managertasksdetails') }}">
                        @csrf
                        <input type="hidden" id="taskDetailsId" name="task_details_id">
                        </form>
                        <div class="table-responsive">
                            <table id="tasksTable" class="datatable table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="d-none">Task id</th>
                                        <th>Task Name</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Completion Percent</th>
                                        <th>Assigned to</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>Project Management</td>
                                        <td>Muhammad Mesum</td>
                                        <td>01/10/2022</td>
                                        <td>In Progress</td>
                                        <td>70%</td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
    <!-- Create Task Modal -->
    <div id="create_task" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('manager.createnewtask')}}">
                        @csrf
                        <input class="form-control" name="projectId" value="{{$projectId}}" type="hidden">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Task Name</label>
                                    <input class="form-control" name="task_name" type="text" placeholder="Task Name" required>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label>Task Description</label>
                            <textarea rows="4" class="form-control summernote" name="task_description" required placeholder="Enter task Description here"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" name="task_deadline" required type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Task Priority</label>
                                    <select class="form-control select" name="task_Priority" required>
                                        <option disabled="disabled" value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Normal">Normal</option>
                                        <option Value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Assigned to <span class="text-danger">*</span></label>
                                    <select class="select " id="assigned_to" name="assigned_to" required>
                                        <option value="" disabled selected>None</option>
                                        {{-- <option class="selected disabled" value="">{{$employee->department}} - (Current)</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Create Task Modal -->


        <!-- Edit Task Modal -->
        <div id="edit_task" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('manager.managerUpdateTask')}}">
                            @csrf
                            <input class="form-control" name="edit_task_id" id='edit_task_id'  type="hidden">
                            <input class="form-control" name="hiddenEditAssignedTo" id="hiddenEditAssignedTo" type="hidden">
                            <input class="form-control" name="hiddenEditPriority" id="hiddenEditPriority" type="hidden">
                            <input class="form-control" name="hiddenEditStatus" id="hiddenEditStatus" type="hidden">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input class="form-control" id="edit_taskname" name="edit_taskname" type="text" placeholder="Task Name" required>
                                    </div>
                                </div>
    
    
                            </div>
                            <div class="form-group">
                                <label>Task Description</label>
                                <textarea rows="4" class="form-control summernote" id="edit_task_description" name="edit_task_description" required placeholder="Enter task Description here"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" id="edit_task_deadline" name="edit_task_deadline" required type="text">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Task Priority</label>
                                        <select class="form-control select" id="edit_task_Priority" name="edit_task_Priority" required>
                                            <option value="High">High</option>
                                            <option value="Normal">Normal</option>
                                            <option Value="Low">Low</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Task Status</label>
                                        <select class="form-control select" id="edit_task_status" name="edit_task_status" required>
                                            <option value="New">New</option>
                                            <option value="On Hold">On Hold</option>
                                            <option Value="Done">Done</option>
                                            <option Value="In Progress">In Progress</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assigned to<br> <span class="text-danger" id="currentlySelected"></span></label>
                                        {{-- <label>Assigned to <span class="text-danger">*</span></label> --}}
                                        <select class="select " id="edit_assigned_to" name="edit_assigned_to" required>
                                            <option value="" disabled >None</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Completion Percentage</label>
                                        <input class="form-control" id="edit_completion_Percent" name="edit_completion_Percent" type="number" max='100' placeholder="Completion percent" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Completed</label>
                                        <input class="radio" name="edit_completed" value="1" type="radio" id="completed"> Yes
                                        <input class="radio" name="edit_completed" value="0" type="radio" id="noCompleted"> No
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Task Modal -->
</div>

<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#create-new-task').on('click', function() {
            $('#assigned_to').empty();
            $('#assigned_to').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET'
                , url: "{{ route('manager.ajaxTaskAssigned') }}"
                , success: function(response) {
                    var response = JSON.parse(response);
                    $('#assigned_to').empty();
                    $('#assigned_to').append(`<option value="0" disabled selected>Assign To *</option>`);
                    response.forEach(element => {
                        $('#assigned_to').append(`<option value="${element['user_id']}">${element['name']}</option>`);
                    });
                }
            });
        });
        
        
        
        
        
        
    });
</script>
<script>
    $(document).ready(function() {
        $('.getTasksfromCount').click(function (e) { 
            e.preventDefault();
            var id = $(this).attr('id');
            var projectId = $('#taskProjectID').val();
            var url = "{{ route('manager.ajaxGetTasks', ":id") }}";
            url = url.replace(':id', id);
            var table = $("#tasksTable tbody");
            $.ajax({
                type: "GET",
                url: url,
                data:{'projectId':projectId},
                success: function (response){
                    // $('#tasksTable').find('tbody').empty();
                    var response = JSON.parse(response);                   
                    table.empty();
                    response.forEach(element => {
                        // table.append("<tr><td class='d-none'>"+element.task_id+"</td><td><a class='task-details' value='"+element.task_id+"' href='{{ route('manager.managertasksdetails', ['taskId' => Crypt::encrypt("+element.task_id+")])}}' >"+element.TaskName+"</a></td>   <td>"+element.deadline+"</td><td>"+element.task_status+"</td><td>"+element.Completion_percent+"%"+"</td>   <td>"+element.name+"</td> <td class='text-right'><div class='dropdown dropdown-action'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a><div class='dropdown-menu dropdown-menu-right'><a class='dropdown-item' href='#' data-toggle='modal' data-target='#edit_leave'><i class='fa fa-pencil m-r-5'></i> Edit</a><a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_approve' value="+element.task_id+"><i class='fa fa-trash-o m-r-5'></i> Delete</a></div></div></td></tr>");
                        table.append("<tr><td class='d-none'>"+element.task_id+"</td><td><a onclick='submitTaskDetailsForm("+element.task_id+")' class='task-details' value='"+element.task_id+"' href='#' >"+element.TaskName+"</a></td>   <td>"+element.deadline+"</td><td>"+element.task_status+"</td><td>"+element.Completion_percent+"%"+"</td>   <td>"+element.name+"</td> <td class='text-right'><div class='dropdown dropdown-action'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a><div class='dropdown-menu dropdown-menu-right'><a   class='dropdown-item' onclick='editAjax("+element.task_id+")' type='button' href='#' data-toggle='modal' id='edit-task-btn' data-target='#edit_task' value='"+element.task_id+"' ><i class='fa fa-pencil m-r-5'></i> Edit</a><a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_approve' value="+element.task_id+"><i class='fa fa-trash-o m-r-5'></i> Delete</a></div></div></td></tr>");
                    });
                }
            });
        });
    });
</script>
{{-- for editing task using ajax --}}
<script>
    function editAjax(task_id){
        var url = "{{ route('manager.editTaskAjax', ":id") }}";
        url = url.replace(':id', task_id);
        console.log(task_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response){
                getTeamMembersonEdit();
                var response = JSON.parse(response);
                response.forEach(element => {
                    $('#edit_task_id').val(task_id);
            $('#edit_taskname').val(element.TaskName);
            $('#edit_task_description').val(element.TaskDescription);
                var d= new Date(element.deadline);
                var formatted_deadline =d.getDate()+'/'+("0"+(d.getMonth()+1)).slice(-2)+'/'+(d.getFullYear())
            $('#edit_task_deadline').val(formatted_deadline);
            $('#edit_completion_Percent').val(element.Completion_percent);
            $('#hiddenEditAssignedTo').val(element.AssignedTo);
            $('#hiddenEditPriority').val(element.taskPriority);
            $('#hiddenEditStatus').val(element.task_status);
            $('#currentlySelected').text("Currently Assigned to: "+element.name);
            // * for checking project status
            if (element.is_completed){
                    $("#completed").prop("checked", true);
                    } else {
                    $("#noCompleted").prop("checked", true);  
                    }
            if (element.taskPriority) {
                $("#edit_task_Priority option[value='"+element.taskPriority+"']").remove();
                $('#edit_task_Priority').append(`<option selected disabled value="${element.taskPriority}">${element.taskPriority}</option>`);
                
                // $("#edit_task_Priority option[value='"+element.taskPriority+"']").prop('selected', true);
                // $('#edit_task_Priority').val(element.taskPriority).prop('selected', true);
                // $("#edit_task_Priority option[value='"element.taskPriority"']").prop('selected', selected);
            }
            if (element.task_status) {
                $("#edit_task_status option[value='"+element.task_status+"']").remove();
                $('#edit_task_status').append(`<option selected disabled value="${element.task_status}">${element.task_status}</option>`);
               
            }
                });                   


            }
        });
    }
   
</script>
<script>
    function submitTaskDetailsForm(id){
        $('#taskDetailsId').val(id);
        $('#getTaskDetails').submit();
    }
</script>

{{-- Script for getting team members on ajax edit --}}
<script>
 function getTeamMembersonEdit(){
    $.ajax({
                type: 'GET'
                , url: "{{ route('manager.ajaxTaskAssigned') }}"
                , success: function(response) {
                    var response = JSON.parse(response);
                    $('#edit_assigned_to').empty();
                    $('#edit_assigned_to').append(`<option value="0" disabled selected>Assign To *</option>`);
                    response.forEach(element => {
                        $('#edit_assigned_to').append(`<option value="${element['user_id']}">${element['name']}</option>`);
                    });
                }
            });
 }
</script>
@endsection
