<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from hencework.com/theme/doodle/full-width-light/panels-wells.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:10 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Doodle I Fast build Admin dashboard for any platform</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Summernote css -->
		<link rel="stylesheet" href="include/vendors/bower_components/summernote/dist/summernote.css" />
		
		<!-- switchery CSS -->
		<link href="include/vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	
		<!-- Custom CSS -->
		<link href="include/dist/css/style.css" rel="stylesheet" type="text/css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Font awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper theme-1-active pimary-color-red">
			
			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a href="index-2.html">
								<img class="brand-img" src="include/img/logo.png" alt="brand"/>
								<span class="brand-text">doodle</span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
					<form id="search_form" role="search" class="top-nav-search collapse pull-left">
						
					</form>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">						
						<li class="dropdown auth-drp">
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="include/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
								<li>
									<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
								</li>
								<li>
									<a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
								</li>
								<li>
									<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
								</li>
								<li>
									<a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
								</li>
								<li class="divider"></li>
								<li class="sub-menu show-on-hover">
									<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
									<ul class="dropdown-menu open-left-side">
										<li>
											<a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
										</li>
										<li>
											<a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
										</li>
										<li>
											<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
										</li>
									</ul>	
								</li>
								<li class="divider"></li>
								<li>
									<a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>	
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li class="navigation-header">
					<span>Main</span> 
						<i class="zmdi zmdi-more"></i>
					</li>
					<li>
						<a class="active" href="javascript:dashboard()"><div class="pull-left"><i class="fas fa-industry mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="javascript:add_company()"><div class="pull-left"><i class="fas fa-industry mr-20"></i><span class="right-nav-text">Company</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>					
					<li>
						<a href="javascript:add_branch();"><div class="pull-left"><i class="fas fa-sitemap mr-20"></i><span class="right-nav-text">Branch</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>		
					<li>
						<a href="javascript:add_employee();"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Employement(HRM)</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>	
									
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Plan </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="app_dr" class="collapse collapse-level-1">
							<li>
								<a href="javascript:plan_list();">Plan list</a>
							</li>
							<li>
								<a href="javascript:plan_bonus()">Plan bonus</a>
							</li>
							<li>
								<a href="javascript:plan_type();">Plan type</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="javascript:profession();"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Profession</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>	
					<li>
						<a href="JavaScript:ranks();"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Ranks</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="javascript:super_adviser();"><div class="pull-left"><i class="fas fa-award mr-20"></i><span class="right-nav-text">Super Adviser</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="javascript:target_amount();"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Target amount</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>				
				</ul>
			</div>
			<!-- /Left Sidebar Menu -->
			
			<!-- Main Content -->
		
			<!-- /Main Content -->			
		</div>
		<!-- /#wrapper -->
		</div>
		<script type="text/javascript">
			function dashboard()
			{
				alert("dashboard");
			}
			function add_company()
			{
				alert("add_company");
			}
			function add_branch()
			{

			}
			function add_employee()
			{
				
			}
			function plan_list()
			{
				
			}
			function plan_bonus()
			{
				
			}
			function plan_type()
			{
				
			}
			function profession()
			{
				
			}
			function ranks()
			{
				
			}
			function super_adviser()
			{
				
			}
			function target_amount()
			{
				
			}
		</script>
		<!-- jQuery -->
		<script src="include/vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="include/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Fancy Dropdown JS -->
		<script src="include/dist/js/dropdown-bootstrap-extended.js"></script>
	
		<!-- Slimscroll JavaScript -->
		<script src="include/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="include/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
		
		<!-- Switchery JavaScript -->
		<script src="include/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
		<!-- Init JavaScript -->
		<script src="include/dist/js/init.js"></script>
	</body>
</html>