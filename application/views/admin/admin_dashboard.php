<?php
if (1==1) 
{
	//$ad_option=$_SESSION['admin'];
}

?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from hencework.com/theme/doodle/full-width-light/panels-wells.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:10 GMT -->
<head>
       <!-- jQuery -->
		<script src="<?php echo base_url('include/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

		<!--Select 2-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!--Datatables-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Admin-Prathvi agroproducer</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<style type="text/css">
			input[type=number]::-webkit-inner-spin-button,
			input[type=number]::-webkit-outer-spin-button {
			    -webkit-appearance: none;
			    margin: 0;
			}
		</style>
		
		<!-- Summernote css -->
		<link rel="stylesheet" href="<?php echo base_url('include/vendors/bower_components/summernote/dist/summernote.css'); ?>" />
		
		<!-- switchery CSS -->
		<link rel="stylesheet" href="<?php echo base_url('include/vendors/bower_components/switchery/dist/switchery.min.css'); ?>" />
	
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('include/dist/css/style.css'); ?>" />

		

		<!-- Font awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<!-- Jasny-bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" />

		
	
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
								<img class="brand-img" src="<?php echo base_url('include/img/logo.png'); ?>" alt="brand"/>
								<span class="brand-text">ADMIN</span>
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
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url('include/img/user1.png'); ?>" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
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
									<a href="javascript:logout();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
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
						<a class="active" href="javascript:dashboard()"><div class="pull-left"><i class="fas fa-chart-line mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>
					<!--<li>
						<a href="javascript:add_company()"><div class="pull-left"><i class="fas fa-industry mr-20"></i><span class="right-nav-text">Company</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>-->					
					<li>
						<a href="javascript:add_branch();"><div class="pull-left"><i class="fas fa-sitemap mr-20"></i><span class="right-nav-text">Branch</span></div><div class="pull-right"><span class="label label-warning"></span></div><div class="clearfix"></div></a>
					</li>		
							
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#branch"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Branch </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="branch" class="collapse collapse-level-1">
							<li>
								<a href="javascript:add_branch();">Add New Branch</a>
							</li>
							<li>
								<a href="javascript:branch_list();">List of Branches</a>
							</li>	
						</ul>
					</li>
					

					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#adv"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Advisor </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="adv" class="collapse collapse-level-1">
							<li>
								<a href="JavaScript:advisor_list();">Advisor list</a>
							</li>
							<li>
								<a href="JavaScript:advisor();">Add advisor</a>
							</li>	
						</ul>
					</li>

					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="fas fa-user-plus mr-20"></i><span class="right-nav-text">Customer </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="app_dr" class="collapse collapse-level-1">
							<li>
								<a href="JavaScript:cust_list();">Customer list</a>
							</li>
							<li>
								<a href="javascript:add_customer();">Add Customer</a>
							</li>	
						</ul>
					</li>			
				</ul>
			</div>
			<!-- /Left Sidebar Menu -->
			
			<!-- Main Content -->
			<div id="main_content">
				
			</div>
			<!-- /Main Content -->			
		
		<!-- /#wrapper -->
	
		<script type="text/javascript">
			
			
			$(document).ready(function()
			{
				//var option="<?php //echo $ad_option; ?>";
				var option;
				if (option=="dashboard") 
				{
					//alert(option);
					dashboard();
				}
				else if (option=="customer") 
				{
					add_customer();
				}
				else if (option=="branch") 
				{
					add_branch();
				}
				else if (option=="company") 
				{
					add_company();
				}
				else
				{
					dashboard();
				}
			});
			
			function dashboard()
			{
				$.ajax({
					url:"<?php echo base_url('admin/dashboard'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function branch_list()
			{
				alert();
			}
			function add_company()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_company'); ?>",
					type:"post",
					success:function(result)
					{
						<?php $_SESSION['admin']='company'; ?>
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function add_branch()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_branch'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function add_customer()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_customer'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function plan_list()
			{
				$.ajax({
					url:"<?php echo base_url('admin/plan_list'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}

			function advisor_list()
			{
				$.ajax({
					url:"<?php echo base_url('admin/advisor_list'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}

			function advisor()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_advisor'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function plan_type()
			{
				$.ajax({
					url:"<?php echo base_url('admin/plan_type'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function profession()
			{
				$.ajax({
					url:"<?php echo base_url('admin/profession'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function cust_list()
			{
				$.ajax({
					url:"<?php echo base_url('admin/cust_list'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function super_adviser()
			{
				$.ajax({
					url:"<?php echo base_url('admin/super_adviser'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function relation()
			{
				$.ajax({
					url:"<?php echo base_url('admin/relation'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}

			function logout()
			{
				window.location='<?php echo base_url("login"); ?>';
			}
		</script>
        


			
			
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>		
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('include/dist/js/jquery.slimscroll.js'); ?>"></script>		
		
		<!-- Fancy Dropdown JS -->
		<script src="<?php echo base_url('include/dist/js/dropdown-bootstrap-extended.js'); ?>"></script>		
	
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('include/dist/js/jquery.slimscroll.js'); ?>"></script>		
		
		<!-- Owl JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js'); ?>"></script>
		
		<!-- Switchery JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/switchery/dist/switchery.min.js'); ?>"></script>		
	
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('include/dist/js/init.js'); ?>"></script>
		
	</body>
</html>