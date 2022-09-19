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
                    </form>
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
                        <h5 class="modal-title">Create task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('manager.createnewtask')}}">
                            @csrf
                            <input class="form-control" name="projectId" value="{{$projectId}}" type="hidden">
                        </form>
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
                    console.log(response);
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
                        table.append("<tr><td class='d-none'>"+element.task_id+"</td><td><a onclick='submitTaskDetailsForm("+element.task_id+")' class='task-details' value='"+element.task_id+"' href='#' >"+element.TaskName+"</a></td>   <td>"+element.deadline+"</td><td>"+element.task_status+"</td><td>"+element.Completion_percent+"%"+"</td>   <td>"+element.name+"</td> <td class='text-right'><div class='dropdown dropdown-action'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a><div class='dropdown-menu dropdown-menu-right'><a  type='button' class='dropdown-item' id='editTaskbtn' href='#' data-toggle='modal' data-target='#edit_task' value='"+element.task_id+"' ><i class='fa fa-pencil m-r-5'></i> Edit</a><a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_approve' value="+element.task_id+"><i class='fa fa-trash-o m-r-5'></i> Delete</a></div></div></td></tr>");
                    });
                }
            });
        });
    });
</script>
<script>
    $('#editTaskbtn').click(function (e) { 
        e.preventDefault();
        console.log('hello world');
    });
    // function taskDetails(id) {
    //    var url = "{{ route('manager.managertasksdetails', ":id") }}";
    //    url = url.replace(':id', id);
    // //    window.location.href=(url);
    //    $.ajax({
    //         headers:{
    //             'X-CSRF-TOKEN': "{{csrf_token()}}",
    //                 },
    //         type: "GET",
    //         url: url,
    //         data:{'taskId':id},
    //         success: function (response) {
    //             console.log('HELLO WORLD');                
    //         }
    //     });
    // }
</script>
<script>
    function submitTaskDetailsForm(id){
        console.log(id);
        $('#taskDetailsId').val(id);
        $('#getTaskDetails').submit();
    }
</script>

@endsection
