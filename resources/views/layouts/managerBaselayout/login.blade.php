<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - HRMS 24-7 Consultancy</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/img/favicon.png'); }}">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css'); }}">
        
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css'); }}">
		
		<!-- Main CSS -->

		<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css'); }}">
		
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a>
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							@php
								// $var = DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
							@endphp
							
							<!-- Account Form -->
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="text" name="email">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											{{-- <a class="text-muted" href="forgot-password.html" onclick="return false;">
												Forgot password?
											</a> --}}
										</div>
									</div>
									<input class="form-control" type="password" name="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								{{-- <div class="account-footer">
									<p>Don't have an account yet? <a href="register.html">Register</a></p>
								</div> --}}
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		

        {{-- javascript files --}}
		    <!-- jQuery -->
			<script src="{{ URL::asset('assets/js/jquery-3.2.1.min.js'); }}"></script>
            
			<!-- Bootstrap Core JS -->			
			<script src="{{ URL::asset('assets/js/popper.min.js'); }}"></script>
			<script src="{{ URL::asset('assets/js/bootstrap.min.js'); }}"></script>
		
	         <!-- Custom JS -->
             <script src="{{ URL::asset('assets/js/app.js'); }}"></script>
		
    </body>
</html>