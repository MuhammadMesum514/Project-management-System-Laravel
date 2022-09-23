{{-- it will be dashboard page for user --}}
@extends('layouts.userBaseLayout.master')

@section('css')
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
                    <h3 class="page-title"> All Projects</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Projects</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->



        <div class="row">
            @foreach ($projects as $project)

            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                     
                        <h4 class="project-title"><a href="{{ route('user.userProjectDetails', ['projectId' => Crypt::encrypt($project->project_id)])}}">{{$project->ProjectName}}</a></h4>
                        {{-- <small class="block text-ellipsis m-b-15">
                        <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                        <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                    </small> --}}
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

</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
@endsection
@section('script')

@endsection
