<?php
$cust_id=$_SESSION['current_customer'];
	$data=$this->db->select('*')->from('hrm')
		                              ->join('hrm_relation','hrm.HRM_ID=hrm_relation.HRM_ADDED_BY')
		                                ->join('wallet_balance','wallet_balance.HRM_ID=hrm_relation.NEW_HRM_ID')
									  ->join('plan_activation','plan_activation.PLAN_ACTIVATION_ID=wallet_balance.PLAN_ACTIVATION_ID')
								   	  ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
								   	  ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')
								   	 /// ->join('hrm_relation','hrm.HRM_ID=hrm_relation.HRM_ADDED_BY')
								   	  //->join('hrm','hrm.HRM_ID=')
								   	  ->where('wallet_balance.HRM_ID',$cust_id)
								   	  ->where('wallet_balance.WALLET_AMOUNT >',0)
								   	  ->get()->row();

	//print_r($data);
	$receipt="EHAPCS";
	$reg_no=$data->HRM_REG_NO;;
	$name=$data->HRM_TITLE." ".$data->HRM_FIRST_NAME." ".$data->HRM_MIDDLE_NAME." ".$data->HRM_LAST_NAME;
	$plan_id=$data->PLAN_ID;
	$plan_name=$data->PLAN_NAME;
	$redemption_val=($data->PLAN_EMI_AMOUNT*$data->PLAN_EMI_PERIOD)-$data->PLAN_EMI_AMOUNT;
	$agent_code=$data->HRM_ADDED_BY;
	$red_period=$data->PLAN_EMI_PERIOD;
	$amount=$data->PLAN_EMI_AMOUNT;
	$date = strtotime(date('Y-M-D'). " + 1 month");
	$next_date = date("Y-m-d",$date);
	echo $next_date;

	$red_date=$data->PLAN_EXPIRY_DATE;
	$cst=$this->db->select('*')->from('hrm')->where('HRM_ID',$_SESSION['current_customer'])->get()->row();
	$cust=$cst->HRM_TITLE." ".$cst->HRM_FIRST_NAME." ".$cst->HRM_MIDDLE_NAME." ".$cst->HRM_LAST_NAME;
	$wall_id=$data->WALLET_ID;
	//$redemp_date=date('d-M-Y',$red_date);

		//$next=;
	//$pol_no=;
	//$inst_amt=;
	//$date=date();
	//$next_date=$data->;




?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from hencework.com/theme/doodle/full-width-light/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:43 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>PRINT BILL</title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
	 <!-- jQuery -->
		<script src="<?php echo base_url('include/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>	
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!--Datatables-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
		<link rel="stylesheet" href="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" />	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper theme-1-active pimary-color-red">			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">invoice</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index-2.html">Dashboard</a></li>
								<li><a href="#"><span>special pages</span></a></li>
								<li class="active"><span>invoice</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
							<hr class="light-grey-hr mb-10">
								<div>
									<h2 class="text-center">Emperial Height Agro Producer Cooperative Society PVT LTD</h2>
								</div>
								<hr class="light-grey-hr mb-8">
								<div class="clearfix"></div>
							<div class="seprator-block"></div>
								<div class="panel-heading">
									<div class="pull-left">
										<h4 class="panel-title txt-dark">Receipt No:<small ><?php echo "EHAPCS".$wall_id?></small></h4>
										<div class="seprator-block"></div>
										<!--<h6 class="panel-title txt-dark">Installment No:<small >4</small></h6>-->
										<h6 class="panel-title txt-dark">Redemption Value:<small >Rs.<?php echo $redemption_val ?> (After APaying All Installments)</small></h6>
										<h6 class="panel-title txt-dark">Agent Code : <small ><?php echo $agent_code ?></small></h6>
										<h6 class="panel-title txt-dark">Policy No : <small ><?php echo $plan_id ?></small></h6>
										<h6 class="panel-title txt-dark">Plan :<small ><?php echo $plan_name ?></small></h6>
										<h6 class="panel-title txt-dark">Next Installment Date : <small ><?php echo $next_date ?></small></h6>
										<h6 class="panel-title txt-dark">Mode Of Payment: <small >CASH</small></h6>
										<h6 class="panel-title txt-dark">Redemption Period :<small ><?php echo $red_period; ?> MONTHS</small></h6>
										<!--<h6 class="panel-title txt-dark">Rupees in Words :<small >One Thousand Five Hundred Only.</small></h6>-->
										
									</div>
									<div class="pull-right">
									<h6 class="panel-title txt-dark">Redemption Date : <small ><?php//echo $redemp_date?></small></h6>
									<div class="seprator-block"></div>
									<h6 class="panel-title txt-dark">Customer Account No : <small ><?php echo $_SESSION['current_customer']?></small></h6>
									<h6 class="panel-title txt-dark">Installment Amount : <small ><?php echo $amount?></small></h6>
									<h6 class="panel-title txt-dark">Late Payment Charges : <small >Rs.0</small></h6>
									<h6 class="panel-title txt-dark">Total Payble Amount : <small ><?php echo $amount ?></small></h6>
									<h6 class="panel-title txt-dark">Total Amount : <small ><?php echo $amount ?></small></h6>
									<div class="seprator-block"></div>
									<h6 class="panel-title txt-dark">Transaction Date:<small ><?php echo date('d-M-Y'); ?></small></h6>
									<h6 class="panel-title txt-dark">Received with Thanks From Mr./Mrs.:<small ><?php echo $cust ?></small></h6>
									<div class="seprator-block"></div>
									<h5 class="panel-title txt-dark">For Empirial Height Agro Producer PVT LTD </h5>
									</div>
														
									<div class="clearfix"></div>
								
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					
				</div>
				
				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2017 &copy; Doodle. Pampered by Hencework</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
				
			</div>
			<!-- /Main Content -->
			
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
			
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

<!-- Mirrored from hencework.com/theme/doodle/full-width-light/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:43 GMT -->
</html>