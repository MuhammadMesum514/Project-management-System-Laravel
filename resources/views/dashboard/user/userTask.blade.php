{{-- it will be dashboard page for user --}}
@extends('layouts.userBaseLayout.master')

@section('css')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> --}}
@endsection

@section('header')
@include('layouts.userBaseLayout.header')
@endsection


@section('sidebar')
@include('layouts.userBaseLayout.sidebar')
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

        {{-- submit task ID to get task Details  --}}
        <form id="getTaskDetails" method="POST" action="{{ route('user.userTaskDetails') }}">
            @csrf
            <input type="hidden" id="taskDetailsId" name="task_details_id">
        </form>
        {{-- submit task ID to get task Details  --}}

        <div class="row">
            <div class="col-sm-12">
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
                                </tbody>
                            </table>
                        </div>
                   
            </div>
        </div>
        
    </div>
    <!-- /Page Content -->
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
                        <form method="POST" action="{{route('user.userUpdateTask')}}">
                            @csrf
                            <input class="form-control" name="edit_task_id" id='edit_task_id'  type="hidden">
                            <input class="form-control" name="hiddenEditStatus" id="hiddenEditStatus" type="hidden">
                            <div class="row">
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
{{-- Ajax for showing data in table based on task Count --}}
<script>
    $(document).ready(function() {
        $('.getTasksfromCount').click(function (e) {

            e.preventDefault();
            var id = $(this).attr('id');
            console.log(id);
            var projectId = $('#taskProjectID').val();
            var url = "{{ route('user.ajaxGetUserTasks', ":id") }}";
            url = url.replace(':id', id);
            var table = $("#tasksTable tbody");
            $.ajax({
                type: "GET",
                url: url,
                data:{'projectId':projectId},
                success: function (response){
                    var response = JSON.parse(response);                   
                    table.empty();
                    response.forEach(element => {
                        table.append("<tr><td class='d-none'>"+element.task_id+"</td><td><a onclick='submitTaskDetailsForm("+element.task_id+")' class='task-details' value='"+element.task_id+"' href='#' >"+element.TaskName+"</a></td>   <td>"+element.deadline+"</td><td>"+element.task_status+"</td><td>"+element.Completion_percent+"%"+"</td>   <td>"+element.name+"</td> <td class='text-right'><div class='dropdown dropdown-action'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a><div class='dropdown-menu dropdown-menu-right'><a   class='dropdown-item' onclick='editAjax("+element.task_id+")' type='button' href='#' data-toggle='modal' id='edit-task-btn' data-target='#edit_task' value='"+element.task_id+"' ><i class='fa fa-pencil m-r-5'></i> Edit</a></div></div></td></tr>");
                    });
                }
            });
        });
    });
</script>


{{-- Task details form submission --}}
<script>
    function submitTaskDetailsForm(id){
        $('#taskDetailsId').val(id);
        $('#getTaskDetails').submit();
    }
</script>

{{-- for editing task using ajax --}}
<script>
    function editAjax(task_id){
        var url = "{{ route('user.userEditTaskAjax', ":id") }}";
        url = url.replace(':id', task_id);
        $.ajax({
            type: "GET",
            url: url,
            success: function (response){
                var response = JSON.parse(response);
                response.forEach(element => {
                    $('#edit_task_id').val(task_id);
                    $('#edit_completion_Percent').val(element.Completion_percent);
                    $('#hiddenEditStatus').val(element.task_status);
                    // * for checking project status
                    if (element.is_completed){
                            $("#completed").prop("checked", true);
                            } else {
                            $("#noCompleted").prop("checked", true);  
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
@endsection
