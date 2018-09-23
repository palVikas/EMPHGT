
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from hencework.com/theme/doodle/full-width-light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:43 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>PRATHVI AGROPRODUCER</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('include/favicon.ico'); ?>">
		<link rel="icon" href="<?php echo base_url('include/favicon.ico'); ?>" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url('include/dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index-2.html">
						<img class="brand-img mr-10" src="include/img/logo.png" alt="brand"/>
						<span class="brand-text">doodle</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="signup.html">Sign Up</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign in to Doodle</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form action="<?php echo base_url('login/login_type'); ?>" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Login as</label>
													<select class="form-control" name="login_type">
														<option value="1">Branch</option>
														<option value="2">Employee</option>
														<option value="3">Admin</option>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">User Id</label>
													<input type="text" name="user_name" class="form-control" required placeholder="Enter user id">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<div class="clearfix"></div>
													<input type="password" name="password" class="form-control" required placeholder="Enter password">
												</div>
												
											
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">sign in</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('include/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('include/dist/js/jquery.slimscroll.js'); ?>"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('include/dist/js/init.js'); ?>"></script>
	</body>

<!-- Mirrored from hencework.com/theme/doodle/full-width-light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:43 GMT -->
</html>