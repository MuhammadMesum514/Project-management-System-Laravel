<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="description" content="HRM 24-7 Consultancy">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
		<meta name="author" content="HRM Admin">
		<meta name="csrf-token" content="{{ csrf_token() }}">	
		<meta name="robots" content="noindex, nofollow">
		<title>Dashboard - HRMS</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/favicon.png') }}">
		<!-- Bootstrap CSS -->
		{{-- <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}"> --}}
		{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}">
<!-- Lineawesome CSS -->
{{-- <link rel="stylesheet" href="{{ URL::to('assets/css/line-awesome.min.css') }}"> --}}
<!-- Datatable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<!--{{-- <link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}"> --}}-->
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!--{{-- <link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}"> --}}-->
<!-- Datetimepicker CSS -->
{{-- <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.css"/> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> --}}
<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}"> 
<!-- Chart CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.4.2/morris.css" integrity="sha512-1Yp/f4otHy/6yrj/SXnNXr/YINbCaFF9UbA01u2hcAuMED7+ZbGc0YjqqMbP0uDdXcEPgxA9/gtJTYLT0fwScA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="{{ URL::to('ssets/plugins/morris/morris.css') }}"> --}}
@yield('css')

<!-- Main CSS -->
		<link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">

			  <!-- Clock CSS -->
			  <link rel="stylesheet" href="{{ URL::to('assets/css/clockstyle.css') }}">
			  {{-- <link rel="stylesheet" href="{{ URL::to('assets/css/mobile.css') }}">	 --}}
		<link rel="stylesheet" href="{{ URL::to('assets/css/navstyles.css') }}">
	</head>

<body>
	<style>
		.invalid-feedback {
			font-size: 14px;
		}
	</style>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@yield('header')
		<!-- /Header -->
		<!-- Sidebar -->
		@yield('sidebar')
		<!-- /Sidebar -->
		<!-- Page Wrapper -->
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
		@yield('content')
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->

	
	<!-- jQuery -->
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<!-- jQuery -->
	
	

	  <!-- Bootstrap Core JS -->
	  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" async ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


	  
	  <!-- Chart JS -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.2.7/morris.min.js" async  integrity="sha512-nF4mXN+lVFhVGCieWAK/uWG5iPru9+/z1iz0MJbYTto85I/k7gmbTFFFNgU+xVRkF0LI2nRCK20AhxFIizNsXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"> </script>
	  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  
	 
  
	  <!-- Slimscroll JS -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" async integrity="sha512-cJMgI2OtiquRH4L9u+WQW+mz828vmdp9ljOcm/vKTQ7+ydQUktrPVewlykMgozPP+NUBbHdeifE6iJ6UVjNw5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	  {{-- <script src="{{ URL::to('assets/js/jquery.slimscroll.min.js') }}"></script> --}}
	  <!-- Select2 JS -->
	  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	  {{-- <script src="{{ URL::to('assets/js/select2.min.js') }}"></script> --}}
	  <!-- Datetimepicker JS -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
	  {{-- <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
	  <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script> --}}
	  <!-- Datatable JS -->
	  <script  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	  <script   src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
	  {{-- <script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
	  <script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script> --}}
	  
	  <!-- Multiselect JS -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/js/bootstrap-multiselect.min.js" async integrity="sha512-fp+kGodOXYBIPyIXInWgdH2vTMiOfbLC9YqwEHslkUxc8JLI7eBL2UQ8/HbB5YehvynU3gA3klc84rAQcTQvXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js" async ></script>
	  {{-- <script src="{{ URL::to('assets/js/multiselect.min.js') }}"></script>	 --}}
		  
	  {{-- 	Lazy load CDN --}}
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	  <!-- Custom JS -->
	  <script src="{{ URL::to('assets/js/app.js') }}"></script>
	  @yield('importScripts');
	 
	  {{-- DEFER LOAD Images --}}
	  <script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    }    
    
    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
	</script>
	  @yield('script')
</body>

</html>