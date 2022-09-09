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
                
            </div>
        </div>
        <!-- /Page Header -->
        
        
        
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                        <small class="block text-ellipsis m-b-15">
                            <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                            <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                        </small>
                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. When an unknown printer took a galley of type and
                            scrambled it...
                        </p>
                        <div class="pro-deadline m-b-15">
                            <div class="sub-title">
                                Deadline:
                            </div>
                            <div class="text-muted">
                                17 Apr 2019
                            </div>
                        </div>
                        <div class="project-members m-b-15">
                            <div>Project Leader :</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="{{asset('/assets/img/profiles/avatar-16.jpg')}}"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="project-members m-b-15">
                            <div>Team :</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                </li>
                                <li class="dropdown avatar-dropdown">
                                    <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="avatar-group">
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-10.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-11.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-12.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-13.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-01.jpg">
                                            </a>
                                            <a class="avatar avatar-xs" href="#">
                                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                            </a>
                                        </div>
                                        <div class="avatar-pagination">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                        <progress id="file" class="progress progress-xs mb-0 w-100" value="40" max="100"> 32% </progress>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
		  

</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')
{{-- AJAX REQUEST FOR SHIFT SELCTION --}}
{{-- <script>
    $(document).ready(function() {

        $('#addTeam').on('click', function() {
            // let shift = $(this).val();
            $('#teamLead').empty();
            $('#teamLead').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET'
                , url: "ajaxTeamLead"
                , success: function(response) {
					// console.log(response);
                    var response = JSON.parse(response);
                    // console.log(response);
                    $('#teamLead').empty();
                    $('#teamLead').append(`<option value="0" disabled selected>Select Select Manager*</option>`);
                    response.forEach(element => {
                        $('#teamLead').append(`<option value="${element['manager_id']}">${element['name']}</option>`);
                    });
                }
            });
        });
    });

</script> --}}
@endsection