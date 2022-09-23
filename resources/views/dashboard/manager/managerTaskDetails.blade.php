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
                
   <style>
	.desc-title{
		color: red;
		border-bottom: 2px solid;
		margin-bottom: '11px';
		font-size: '24px';
	}
   </style>
			<input class="form-control" type="hidden" placeholder="task" id="hiddenTaskDetailId" name="hiddenTaskDetailId" value="{{$taskDetails[0]->task_id}}" />
					<div class=" chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-lg-7 message-view task-view task-left-sidebar">
							<div class="card">
								<div class="card-body">
									<div class="project-title">
										<h4 class="card-title desc-title" >Task Description</h4>
									</div>
									<p>{{$taskDetails[0]->TaskDescription}}</p>
									</div>
							</div>
						</div>
						<div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
							<div class="chat-window">
								<div class="fixed-header">
									<div class="navbar">
										<div class="task-assign">
											<a class="task-complete-btn @php echo $taskDetails[0]->is_completed ? 'task-completed': ''   @endphp" id="task_complete" onclick='deleteTaskAjax(getTaskCompletionFlag()?1:0)' href="javascript:void(0);">
											{{-- <a class="task-complete-btn" id="task_complete" onclick='deleteTaskAjax()' href="#"> --}}
												<i class="material-icons">check</i> Mark Complete
											</a>
										</div>
										{{-- <ul class="nav float-right custom-menu">
											<li class="dropdown dropdown-action">
												<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Modify Task</a>
													<a   class='dropdown-item' onclick='editAjax({{$taskDetails[0]->task_id}})' type='button' href='#' data-toggle='modal' id='edit-task-btn' data-target='#edit_task' value='"+element.task_id+"' ><i class='fa fa-pencil m-r-5'></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)">Settings</a>
												</div>
											</li>
										</ul> --}}
									</div>
								</div>
								<div class="chat-contents task-chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="chats">
													<h4>{{$taskDetails[0]->TaskName}}</h4>
													<div class="task-header">
														<div class="assignee-info">
															<a href="#">
																<div class="avatar">
																	<img alt="" src="assets/img/profiles/avatar-02.jpg">
																</div>
																<div class="assigned-info">
																	<div class="task-head-title">Assigned To</div>
																	<div class="task-assignee">{{$taskDetails[0]->name}}</div>
																</div>
															</a>
															{{-- <span class="remove-icon">
																<i class="fa fa-close"></i>
															</span> --}}
														</div>
														<div class="task-due-date">
															<a href="#">
																<div class="due-icon">
																	<span>
																		<i class="material-icons">date_range</i>
																	</span>
																</div>
																<div class="due-info">
																	<div class="task-head-title">Due Date</div>
																	<div class="due-date"> @php echo  date_format(date_create($taskDetails[0]->deadline),"F j, Y"); @endphp
																	</div>
																</div>
															</a>
														</div>	
														
														{{-- task progress --}}
														<div class="task-due-date">
															<a href="#">
																<div class="due-icon">
																	<span>
																		<i class="material-icons">check</i>
																	</span>
																</div>
																<div class="due-info">
																	<div class="task-head-title">Completion Percent</div>
																	<div class="due-date">{{ $taskDetails[0]->Completion_percent}}%
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
													<hr class="task-line">
													{{-- <div class="task-desc">
														<div class="task-desc-icon">
															<i class="material-icons">subject</i>
														</div>
														<div class="task-textarea">
															<textarea class="form-control" placeholder="Description"></textarea>
														</div>
													</div> --}}
													<hr class="task-line">
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">{{$taskDetails[0]->TaskName}}</a> <span class="task-info-subject">created on</span></span>
														<div class="task-time">@php echo  date_format(date_create($taskDetails[0]->created_at),"F j, Y g:i a"); @endphp</div>
													</div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile.html" class="avatar">
																<img alt="" src="assets/img/profiles/avatar-02.jpg">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
																	<p>I'm just looking around.</p>
																	<p>Will you tell me something about yourself? </p>
																</div>
															</div>
														</div>
													</div>
													<div class="completed-task-msg"><span class="task-success"><a href="#">John Doe</a> completed this task.</span> <span class="task-time">Today at 9:27am</span></div>
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-footer">
									<div class="message-bar">
										<div class="message-inner">
											<a class="link attach-icon" href="#"><img src="assets/img/attachment.png" alt=""></a>
											<div class="message-area">
												<div class="input-group">
													<textarea class="form-control" placeholder="Type message..."></textarea>
													<span class="input-group-append">
														<button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
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
{{-- for editing task using ajax --}}
<script>
    function editAjax(task_id){
        var url = "{{ route('manager.editTaskAjax', ":id") }}";
        url = url.replace(':id', task_id);
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

{{-- Ajax for mark as complete --}}
<script>
function deleteTaskAjax(completion_Flag){
		// var completion_Flag=getTaskCompletionFlag();
	var url = "{{ route('manager.markAsComplete', ":id") }}";
        url = url.replace(':id', completion_Flag);
		var task_id = $('#hiddenTaskDetailId').val();
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
        type: 'POST'
        , url: url,
		data:{'hiddenTaskDetailId':task_id}
        , success: function(response) {
        window.location.reload();
        }
        });

}
</script>
<script>
	function getTaskCompletionFlag() {
		console.log('completion_Flag clicked');
			var status;
			if ($('#task_complete').hasClass('task-completed')) {
				$('#task_complete').removeClass('task-completed');
				status = false;
			}
			else{
			$('#task_complete').addClass('task-completed');
			status = true;
		}
	return status;
	}
</script>
@endsection
