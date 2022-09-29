

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


    {{-- Random method --}}

       <!-- Page Content -->
       <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Team</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">MyTeam</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="view-icons">
                        <a href="clients.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row staff-grid-row">
        @if($teamMembers)
            
            @foreach ($teamMembers as $member)
                @php $img=(string)rand(1,30);
                $imgPath="assets/img/profiles/avatar-$img.jpg";
                @endphp
                
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="#" class="avatar"><img alt="team Member" src="{{url($imgPath)}}"></a>
                        {{-- <a href="#" class="avatar"><img alt="team Member" data-src="/assets/img/profiles/avatar-{{$img}}.jpg"></a> --}}
                    </div>
                   
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis">{{$member->name}}</h4>
                    <h5 class="user-name m-t-10 mb-0 text-ellipsis">{{$member->designation}}</h5>
                    <div class="small text-muted">{{$member->department}}</div>
                </div>
            </div>
            @endforeach
        @endif

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