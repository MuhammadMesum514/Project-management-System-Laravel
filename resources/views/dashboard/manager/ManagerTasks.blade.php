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



        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Assigned to</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Completion Percent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Project Management</td>
                                        <td>Muhammad Mesum</td>
                                        <td>01/10/2022</td>
                                        <td>In Progress</td>
                                        <td>70%</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
    <!-- Create Project Modal -->
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
                    <form method="POST" action="{{route('manager.addproject')}}">
                        @csrf
                        <input class="form-control" name="projectId" value="{{$projectId}}" type="hidden">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Task Name</label>
                                    <input class="form-control" name="task_name" type="text" placeholder="Task Name">
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label>Task Description</label>
                            <textarea rows="4" class="form-control summernote" name="task_description" placeholder="Enter Project Description here"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" name="task_deadline" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Task Priority</label>
                                    <select class="form-control select" name="task_Priority">
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
    <!-- /Create Project Modal -->
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
                    $('#assigned_to').append(`<option value="0" disabled selected>Select Select Manager*</option>`);
                    response.forEach(element => {
                        $('#assigned_to').append(`<option value="${element['user_id']}">${element['name']}</option>`);
                    });
                }
            });
        });
    });

</script>
@endsection
