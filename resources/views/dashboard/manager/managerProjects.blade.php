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
        @php
        function TrimDescription($text){
        $max_length = 100;

        if (strlen($text) > $max_length)
        {
        $offset = ($max_length - 3) - strlen($text);
        $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
        }
        return $text;
        }
        @endphp
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
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
                    <div class="view-icons">
                        <a href="#" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="#" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->



        <div class="row">
            @foreach ($projects as $project)
            
            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item edit-project" href="#" data-toggle="modal" data-target="#update_project" value="{{$project->project_id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>
									<button type="button" class="dropdown-item dlt_project" href="#" data-toggle="modal" data-target="#delete_project" value="{{$project->project_id}}"><i class="fa fa-trash m-r-5"></i>Delete</button>
                            </div>
                        </div>
                        <h4 class="project-title" id="project_title" >
                            
                            {{-- <a class="dropdown-item" href="{{ route('manager.managertasks', ['projectId' => Crypt::encrypt($project->project_id)])}}"
							onclick="event.preventDefault(); document.getElementById('View-Project-Details').submit();">{{$project->project_id}}</a>
						<form action="{{ route('manager.managertasks', ['projectId' => Crypt::encrypt($project->project_id)])}}" id="View-Project-Details"  method="post">@csrf</form>
                             --}}
                            <a  href="{{ route('manager.managertasks', ['projectId' => Crypt::encrypt($project->project_id)])}}">{{$project->ProjectName}}</a>
                        </h4>
                        <small class="block text-ellipsis m-b-15">
                            <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                            <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                        </small>
                        <p class="project_description">{{TrimDescription($project->ProjectDescription)}}
                        </p>
                        <div class="pro-deadline m-b-15">
                            <div class="sub-title">
                                Deadline:
                            </div>
                            <div class="text-muted">
                                {{$project->End}}
                            </div>
                        </div>
                       
                    <p class="m-b-5">Progress <span class="text-success float-right">{{$project->progress}}%</span></p>
                    <progress id="file" class="progress progress-xs mb-0 w-100" value="{{$project->progress}}" max="100"> {{$project->progress}}% </progress>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- /Page Content -->

<!-- Create Project Modal -->
<div id="create_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('manager.addproject')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" name="project_Name" type="text">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="project_StartDate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="project_EndDate">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control summernote" name="project_description" placeholder="Enter Project Description here"></textarea>
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


<!-- Update Project Modal -->
<div id="update_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('manager.updateproject')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" name="project_id" type="hidden" id="edit_project_id">
                                <input class="form-control" name="project_Name" required type="text" id="edit_project_name">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Progress</label>
                                <input class="form-control" name="progress" type="number" required id="edit_progress">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Completed</label>
                                <input class="radio" name="completed" value="1" type="radio" id="completed"> Yes
                                <input class="radio" name="completed" value="0" type="radio" id="noCompleted"> No
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Status</label>
                                <input class="radio" name="status"value="New" type="radio" id="New"> New
                                <input class="radio" name="status" value="In progress" type="radio" id="In-Progress"> In-Progress
                                <input class="radio" name="status" value="On Hold" type="radio" id="On-Hold"> On-Hold
                                <input class="radio" name="status" value="Done" type="radio" id="Done"> Done
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" required name="project_StartDate" id="edit_project_start_date" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" required type="text" id="edit_project_end_date" name="project_EndDate">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control summernote" name="project_description" required id="edit_project_description" placeholder="Enter Project Description here"></textarea>
                    </div>
                    
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Update Project Modal -->

<!-- Delete Projects Modal -->
<div class="modal custom-modal fade" id="delete_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('manager.deleteproject') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" id="dlt-id" name="dlt_id" required />
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /Delete Projects Modal -->
</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $(document).on('click','.dlt_project',function (e){ 
            e.preventDefault();
            var atn_id=$(this).val();
            $('#dlt-id').val(atn_id);
        });        
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click','.edit-project',function (e){ 
            e.preventDefault();
            var project_id=$(this).val();
            $.ajax({
                type: "GET",
                url: "editmanagerproject/"+project_id,
                success: function (response) {
                    // console.log(response.project.start);
                    $('#edit_project_id').val(project_id);
                    $('#edit_project_name').val(response.project.ProjectName);
                    $('#edit_project_name').val(response.project.ProjectName);
                        var d= new Date(response.project.start);
                        var d1= new Date(response.project.End);
                        // var formatted_date =d.getDate()+'/'+("0"+(d.getMonth()+1)).slice(-2)+'/'+("0"+d.getFullYear()).slice(-2)
                        var formatted_start_date =d.getDate()+'/'+("0"+(d.getMonth()+1)).slice(-2)+'/'+(d.getFullYear())
                        var formatted_End_date =d1.getDate()+'/'+("0"+(d1.getMonth()+1)).slice(-2)+'/'+(d1.getFullYear())
                    $('#edit_project_start_date').val(formatted_start_date);
                    $('#edit_project_end_date').val(formatted_End_date);
                    $('#edit_project_description').val(response.project.ProjectDescription);
                    $('#edit_progress').val(response.project.progress);
                    // * for checking project status
                    if (response.project.is_completed){
                    $("#completed").prop("checked", true);
                    } else {
                    $("#noCompleted").prop("checked", true);  
                    }

                    switch (response.project.status){
                        case "New":
                            $("#New").prop("checked", true);
                            break;
                        case "In progress":
                            $("#In-Progress").prop("checked", true);
                            break;
                        
                        case "On-Hold":
                            $("#Done").prop("checked", true);
                             break;
                        
                        case "Done":
                            $("#Done").prop("checked", true);
                            break;
                            default:
                             $("#New").prop("checked", true);
                             break;
                    }
                }
               

            });
            // var project_title=$(this).data("projectname");
            // var project_title=$('.project-title').text();
            // console.log(project_title);
            // $('#dlt-id').val(atn_id);
        }); 
    });
</script>
@endsection