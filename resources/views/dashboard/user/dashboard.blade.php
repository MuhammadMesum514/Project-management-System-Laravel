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

    <div class="content container-fluid">
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
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">User Dashboard </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('user.home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Follow Up Calendar</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
         
        
        
        
        
        {{-- PAGE CONTAINER STARTS FORM HERE --}}

        
        {{-- CALENDAR SECTION STARTS --}}
        <div id='calendar'></div>
        {{-- CALENDAR SECTION ENDS--}}

            
        </div>
    </div>
    <!-- /Page Content -->

    
</div>
<!-- /Page Wrapper -->
@endsection
@section('importScripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
@endsection
@section('script')
<script type="text/javascript">
  
    $(document).ready(function () {
          
        /*------------------------------------------
        --------------------------------------------
        Get Site URL
        --------------------------------------------
        --------------------------------------------*/
        var SITEURL = "{{ url('/') }}";
        
        /*------------------------------------------
        --------------------------------------------
        CSRF Token Setup
        --------------------------------------------
        --------------------------------------------*/
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          
        /*------------------------------------------
        --------------------------------------------
        FullCalender JS Code
        --------------------------------------------
        --------------------------------------------*/
        var calendar = $('#calendar').fullCalendar({
                        editable: false,
                        events: SITEURL + "/user/home",
                        displayEventTime: false,
                        editable: false,
                        eventRender: function (event, element, view) {
                            if (event.allDay === 'true') {
                                    event.allDay = true;
                            } else {
                                    event.allDay = false;
                            }
                        },
                        selectable: false,
                        selectHelper: false,
                    });
     
        });
          
        /*------------------------------------------
        --------------------------------------------
        Toastr Success Code
        --------------------------------------------
        --------------------------------------------*/
        function displayMessage(message) {
            toastr.success(message, 'Event');
        } 
        
</script>
{{-- Script for full Calendar --}}
@endsection