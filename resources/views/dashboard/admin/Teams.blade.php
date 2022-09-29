
{{-- it will be dashboard page for user --}}
@extends('layouts.adminBaseLayout.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
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
								<h3 class="page-title">Teams</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Teams</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" id="addTeam" data-target="#add_client"><i class="fa fa-plus"></i> Add Team</a>
								<div class="view-icons">
									<a href="#" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row staff-grid-row">
						@foreach ($teams as $team)
						@php $img=(string)rand(1,30);
						$imgPath="assets/img/profiles/avatar-$img.jpg";
						@endphp
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="#" class="avatar"><img alt="" src="{{url($imgPath)}}"></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i>Delete</a> --}}
									<button type="button" class="dropdown-item dlt_team" href="#" data-toggle="modal" data-target="#delete_team" value="{{$team->team_id}}"><i class="fa fa-pencil m-r-5"></i>Delete</button>

                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis">{{$team->TeamName}}</h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis">{{$team->teamLeadName}}</h5>
					<div class="small text-muted">{{$team->managerDesignation}}</div>
								{{-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> --}}
								<a href="{{ url('admin/project/'.$team->team_id) }}" class="btn btn-white btn-sm m-t-10">View Details</a>
							</div>
						</div>
						@endforeach

						
					</div>
                </div>
				<!-- /Page Content -->
        
        
           <!-- /Page Content -->
		   <!-- Add Team Modal -->
				<div id="add_client" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Team</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="{{route('admin.addteam')}}">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Team Name <span class="text-danger">*</span></label>
												<input class="form-control" name="team_name" type="text">
											</div>
										</div>
									    <div class="col-md-6">
											<div class="form-group">
												<label>Team Lead <span class="text-danger">*</span></label>
												<select class="select " id="teamLead" name="teamLead" required>
													<option value="" disabled selected>None</option>
													{{-- <option class="selected disabled" value="">{{$employee->department}} - (Current)</option> --}}
												</select>
											</div>
										</div> 
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Team Members <span class="text-danger">*</span></label>
												<select class="select teamLead" id="teamMembers" style="width:300px" name="teamMembers[]" multiple="multiple" required>
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
				<!-- /Add Team Modal -->

				<!-- Delete Team Modal -->
		<div class="modal custom-modal fade" id="delete_team" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Are you sure want to delete?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="{{ route('admin.deleteteam') }}">
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
		<!-- /Delete Team Modal -->

</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')
{{-- AJAX REQUEST FOR SHIFT SELCTION --}}
<script>
    $(document).ready(function() {
        $('#addTeam').on('click', function() {
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
</script>
<script>
	// called when a team lead is selected
	$(document).ready(function () {
		$('#teamLead').on('change', function() {
            $('#teamMembers').empty();
            $('#teamMembers').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET'
                , url: "ajaxTeamMembers"
                , success: function(response) {
                    var response = JSON.parse(response);
                    $('#teamMembers').empty();
                    $('#teamMembers').append(`<option value="0" disabled >Select Select Team Members*</option>`);
                    response.forEach(element => {
                        $('#teamMembers').append(`<option value="${element['user_id']}">${element['name']}</option>`);
                    });
                }
            });
        });
    });
	
</script>	
		
		

<script>
    $(document).ready(function () {
        $(document).on('click','.dlt_team',function (e){ 
            e.preventDefault();
            var atn_id=$(this).val();
            $('#dlt-id').val(atn_id);
        });        
    });
</script>
<script>
	$(document).ready(function() {
    $('.teamLead').select2();
});
</script>
@endsection