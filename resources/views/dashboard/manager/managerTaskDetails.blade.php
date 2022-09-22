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
                
					<div class=" chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-lg-7 message-view task-view task-left-sidebar">
							<div class="card">
								<div class="card-body">
									<div class="project-title">
										<h5 class="card-title">Task Discription</h5>
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
											<a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
												<i class="material-icons">check</i> Mark Complete
											</a>
										</div>
										<ul class="nav float-right custom-menu">
											<li class="dropdown dropdown-action">
												<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
													<a class="dropdown-item" href="javascript:void(0)">Settings</a>
												</div>
											</li>
										</ul>
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
															<a href="#" data-toggle="modal" data-target="#assignee">
																<div class="avatar">
																	<img alt="" src="assets/img/profiles/avatar-02.jpg">
																</div>
																<div class="assigned-info">
																	<div class="task-head-title">Assigned To</div>
																	<div class="task-assignee">{{$taskDetails[0]->name}}</div>
																</div>
															</a>
															<span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
														</div>
														<div class="task-due-date">
															<a href="#" data-toggle="modal" data-target="#assignee">
																<div class="due-icon">
																	<span>
																		<i class="material-icons">date_range</i>
																	</span>
																</div>
																<div class="due-info">
																	<div class="task-head-title">Due Date</div>
																	<div class="due-date"> @php
																	echo  date_format(date_create($taskDetails[0]->deadline),"F j, Y");
																		@endphp
																	</div>
																</div>
															</a>
															<span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
														</div>
													</div>
													<hr class="task-line">
													<div class="task-desc">
														<div class="task-desc-icon">
															<i class="material-icons">subject</i>
														</div>
														<div class="task-textarea">
															<textarea class="form-control" placeholder="Description"></textarea>
														</div>
													</div>
													<hr class="task-line">
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">created task</span></span>
														<div class="task-time">Jan 20, 2019</div>
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
									<div class="project-members task-followers">
										<span class="followers-title">Followers</span>
										<a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor">
											<img alt="" src="assets/img/profiles/avatar-16.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles">
											<img alt="" src="assets/img/profiles/avatar-09.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="John Smith">
											<img alt="" src="assets/img/profiles/avatar-10.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus">
											<img alt="" src="assets/img/profiles/avatar-05.jpg">
										</a>
										<a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
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


@endsection
