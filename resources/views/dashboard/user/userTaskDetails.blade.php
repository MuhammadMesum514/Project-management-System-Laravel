@php $img=(string)rand(1,30);
$imgPath="assets/img/profiles/avatar-$img.jpg";
@endphp
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
											<a class="task-complete-btn @php echo $taskDetails[0]->is_completed ? 'task-completed': ''   @endphp" id="task_complete" onclick='markAsComplete(getTaskCompletionFlag()?1:0)' href="javascript:void(0);">
											{{-- <a class="task-complete-btn" id="task_complete" onclick='deleteTaskAjax()' href="#"> --}}
												<i class="material-icons">check</i> Mark Complete
											</a>
										</div>
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
																	<img alt="" src="{{url($imgPath)}}">
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
														<div class="modfychatbody" id="modfychatbody">
														
													</div> 
													</div>
													{{-- <div class="completed-task-msg"><span class="task-success"><a href="#">John Doe</a> completed this task.</span> <span class="task-time">Today at 9:27am</span></div> --}}
													
													
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
													<textarea class="form-control" id="chatMessageBody" required placeholder="Type message..."></textarea>
													<span class="input-group-append">
														<button class="btn btn-primary" id="submitMessageBtn" onclick="sendMessage()"  disabled="disabled" type="button"><i class="fa fa-send"></i></button>
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




</div>
<!-- /Page Wrapper -->

@endsection
@section('importScripts')
@endsection
@section('script')

{{-- Script on Page Load --}}
<script>
$(document).ready(function () {
	loadChat();
});
</script>
{{-- Method to load chat from database --}}
<script>
	function loadChat(){
	var task_id=$('#hiddenTaskDetailId').val();
	var chatExistFlag = $('#modfychatbody').children().length > 0?1:0;
		console.log(chatExistFlag);
	$.ajax({
	type: "get",
	url: "{{ route('user.ajaxUserGetChat', ":chatExistFlag") }}",
	data: {'task_id' :task_id,
			'chatExistFlag':chatExistFlag },
	success: function (response) {
		var response = JSON.parse(response);
		console.log(response);
		// var chatDiv = $('<div class="chat-avatar"><a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a></div><div class="chat-body"><div class="chat-bubble">	<div class="chat-content"><span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span><p>Im just looking around.</p><p>Will you tell me something about yourself? </p>	</div></div></div>');                   
	if(response){
	if ( chatExistFlag) {
		response.forEach(element => {
			$('#modfychatbody').append('<div class="chat-avatar"><a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a></div><div class="chat-body"><div class="chat-bubble">	<div class="chat-content"><span class="task-chat-user">'+element.senderName+'</span> <span class="chat-time">'+element.created_at+'</span><p>'+element.MessageBody+'</p></div></div></div>');
		});
	}
	else{
		console.log("data not found");
		$('#modfychatbody').empty();
		response.forEach(element => {
			$('#modfychatbody').append('<div class="chat-avatar"><a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a></div><div class="chat-body"><div class="chat-bubble">	<div class="chat-content"><span class="task-chat-user">'+element.senderName+'</span> <span class="chat-time">'+element.created_at+'</span><p>'+element.MessageBody+'</p></div></div></div>');
			// $('#modfychatbody').append('<div class="chat-avatar"><a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a></div><div class="chat-body"><div class="chat-bubble">	<div class="chat-content"><span class="task-chat-user">'+element.senderName+'</span> <span class="chat-time">8:35 am</span><p>'+element.MessageBody+'</p></div></div></div>');
		});
		// $('#modfychatbody').append('<div class="chat-avatar"><a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a></div><div class="chat-body"><div class="chat-bubble">	<div class="chat-content"><span class="task-chat-user">'+element.senderName+'</span> <span class="chat-time">8:35 am</span><p>'+element.MessageBody+'</p></div></div></div>');
		// $('#modfychatbody').append(chatDiv);
	}
	}
	}
	});
	}
</script>

{{-- for sending a message --}}
<script>
	function sendMessage(){
		var task_id=$('#hiddenTaskDetailId').val();
		var chatMessageBody=$('#chatMessageBody').val();
		$.ajax({
			type: "get",
			url: "{{ route('user.ajaxUserSendMessage') }}",
			data: {'task_id' :task_id,
					'chatMessageBody':chatMessageBody},
			success: function (response) {
				if (response='Success') {
					$('#chatMessageBody').val("");
					loadChat();
				}
			}
		});
	}
</script>


{{-- Enable send message button only if text exist --}}
<script type="text/javascript">
    $(function () {
        $("#chatMessageBody").keyup(function () {
            //Reference the Button.
            var btnSubmit = $("#submitMessageBtn");
 
            //Verify the TextBox value.
            if ($(this).val().trim() != "") {
                //Enable the TextBox when TextBox has value.
                btnSubmit.removeAttr("disabled");
            } else {
                //Disable the TextBox when TextBox is empty.
                btnSubmit.attr("disabled", "disabled");
            }
        });
    });
</script>

{{-- Ajax for mark as complete --}}
<script>
	function markAsComplete(completion_Flag){
		var url = "{{ route('user.userMarkAsComplete', ":id") }}";
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
