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
        {{-- CONTENT GOES HERE --}}
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
            <style>
                .headingText{
                    color: #fff;
                    font-weight: 700;

                }
                .appendbtn{
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    /* display: flex; */
                    /* align-items: end; */   
                }
                
            </style>
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
                            <h3 class="page-title">Follow Up Form </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Follow Up Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                {{-- PAGE CONTAINER STARTS FORM HERE --}}
              {{-- Main form to be submitted --}}
                <form action="#">
{{-- Perosonal Details Starts here --}} 

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h4 class="card-title mb-0 headingText">Personal details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Assign Date:</label>
                                                        <input type="date" placeholder="Assign Date" required name="assignDate" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Record Number:</label>
                                                        <input type="text" required name="recordNumber" placeholder="Record Number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>First Name:</label>
                                                        <input type="text" placeholder="First Name" name="first_name" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Last Name:</label>
                                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>DOB :</label>
                                                        <input type="date" placeholder="DOB" required name="DOB" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>SSN :</label>
                                                        <input type="tel" required name="SSN" placeholder="xxx-xx-xxxx" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Employer :</label>
                                                        <input type="text" placeholder="Employer" name="employer" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>DOI:</label>
                                                        <input type="date" name="DOI" class="form-control" placeholder="DOI" required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
{{-- personal Details Ends here --}} 
{{-- Insurance Details Starts here --}} 
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h4 class="card-title mb-0 headingText">Insurance details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Insurance :</label>
                                                        <input type="text" placeholder="Insurance" required name="insurance" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>ADJUSTER :</label>
                                                        <input type="text" required name="ADJUSTER" placeholder="ADJUSTER" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Ins. Ph:</label>
                                                        <input type="text" placeholder="Ins. Ph" name="Ins_Ph" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Ins. Fax:</label>
                                                        <input type="text" name="Ins_Fax" class="form-control" placeholder="Ins. Fax" required >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Adj Email :</label>
                                                        <input type="email" placeholder="abc@example.com" required name="adj_email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DA :</label>
                                                        <input type="text" required name="DA" placeholder="DA" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DA PH :</label>
                                                        <input type="tel" placeholder="DA PH" name="DA_Ph" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DA Fax:</label>
                                                        <input type="text" name="DA_Fax" class="form-control" placeholder="DA Fax" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>DA Email:</label>
                                                        <input type="email" placeholder="abc@example.com" required name="DA_email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                     <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10 align-content-end">
                                                    <div class="form-group">
                                                        <label>Adj No 1 :</label>
                                                        <input type="text" required placeholder="Adj Phone"  name="adj_no[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center justify-content-md-around" >
                                                    <button  type="button" id="addfield" class="btn btn-primary appendbtn">+
                                                    </button>
                                                    <button  type="button" id="removefield" class="btn btn-secondary appendbtn">-
                                                    </button>
                                                </div>
                                                <div class="col-md-12" id="phone">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
{{-- Insurance Details ENDS here --}}

{{--  Lien file & BR Starts here --}} 
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-header">
                <h4 class="card-title mb-0 headingText">Lien file & BR details</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lien File :</label>
                                        <input type="text" placeholder="Lien File" required name="lien_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lien Filing Date :</label>
                                        <input type="date" required placeholder="Lien Filing Date" name="lien_filing_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Activation:</label>
                                        <input type="text" placeholder="Activation" name="lien_file_activation" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lien EAMS status:</label>
                                        <input type="text" name="line_eams_status" class="form-control" placeholder="Lien EAMS status" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>EAMS CIC Status :</label>
                                        <input type="text" placeholder="EAMS CIC Status" required name="cic_status" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status Date :</label>
                                        <input type="date" required name="eams_status_date" placeholder="EAMS Status Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lien Conference :</label>
                                        <input type="text" placeholder="Lien Conference" name="lien_conference" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>LC/LT Date:</label>
                                        <input type="date" name="LC_LT_date" class="form-control" placeholder="LC/LT Date" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- BR SECTION --}}
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>BR :</label>
                                        <input type="text" placeholder="BR" required name="BR" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>BR PH. :</label>
                                        <input type="tel" required name="BR_PH" placeholder="BR PH." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>BR Fax :</label>
                                        <input type="text" placeholder="BR FAX" name="BR_FAX" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>BR Email:</label>
                                        <input type="text" name="BR_Email" class="form-control" placeholder="abc@example.com" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- BR SECTION --}}

             
            </div>
        </div>
    </div>
</div>
{{-- Lien file & BR ENDS here --}}

{{--  BILLING SECTION Starts here --}} 
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-header">
                <h4 class="card-title mb-0 headingText">BILLING & DOS details</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First DOS :</label>
                                        <input type="date" placeholder="First DOS" required name="first_DOS" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last DOS :</label>
                                        <input type="date" required name="last_DOS" placeholder="Last DOS" class="form-control">
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Billed :</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="number" placeholder="Billed" name="DOS_Billed" required class="form-control">
                                    </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PAID :</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="number" placeholder="PAID" name="DOS_Paid" required class="form-control">
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>WRITEOFF :</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="number" placeholder="WRITEOFF" name="DOS_WriteOff" required class="form-control">
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>OUTSTANDING :</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="number" placeholder="OUTSTANDING" name="DOS_Outstanding" required class="form-control">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

             
            </div>
        </div>
    </div>
</div>
{{-- BILLING SECTION ENDS here --}}


{{--  Follow Up SECTION Starts here --}} 
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-header">
                <h4 class="card-title mb-0 headingText">Follow Up Information</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Date :</label>
                                        <input type="date" placeholder="Date" required name="Action_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Action Type :</label>
                                        <input type="date" required name="Action_type" placeholder="Action type" class="form-control">
                                    </div>
                                </div>
                                
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comments :</label>
                                        <textarea rows="4" cols="5" class="form-control" name="followUp_comment" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Follow Up Date :</label>
                                        <input type="date" required name="followUp_date" placeholder="Follow Up Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center justify-content-md-around" >
                                    <button  type="button" id="addFollowupfield" class="btn btn-primary appendbtn">+
                                    </button>
                                    <button  type="button" id="removeFollowupfield" class="btn btn-secondary appendbtn">-
                                    </button>
                                </div>
                               
                            </div>
                        </div>
                    </div>
           
            </div>

            <div class="d-flex my-2 justify-content-around align-item-center">
                <Button class="btn btn-secondary" type="button">Cancel</Button>
                <Button class="btn btn-primary" type="submit">Submit</Button>
            </div>
        </div>
    </div>

    
</div>
{{-- Follow Up SECTION ENDS here --}}

            </form>

                {{-- PAGE CONTAINER ENDS HERE--}}
                </div>
            </div>
            <!-- End Page Wrapper-->

    @endsection

@section('script')

<script>
    $(function() {
        count=1;
        $('#addfield').click(function(e) {
            e.preventDefault();
            $('#phone').append(' <div class="form-group"><label>Adj Phone '+ (count+1) +' :</label><input type="text" placeholder="Adj Phone" required name="adj_no[]" class="form-control"></div>');
            count++;
        });
        $('#removefield').click(function(e) {
            e.preventDefault();
            if ($('#phone input').length > 0) {
                $('#phone').children().last().remove();
                    count--;
            }
        });
    });
    </script>
@endsection
