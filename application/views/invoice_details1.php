<?php
	// $cust_id=$_SESSION['current_cust_id'];
	// $data1=$this->db->select('*')->from('hrm')
	// 								  ->join('hrm_relation','hrm.HRM_ID=hrm_relation.HRM_ADDED_BY')
	// 									->join('wallet_balance','wallet_balance.HRM_ID=hrm_relation.NEW_HRM_ID')
	// 								  ->join('plan_activation','plan_activation.PLAN_ACTIVATION_ID=wallet_balance.PLAN_ACTIVATION_ID')
	// 								  ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
	// 								  ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')
	// 								  ->join('branch','branch.BRANCH_ID=hrm.BRANCH_ID')
	// 								  ->join('plan_interest','plan_interest.PLAN_ID=plan.PLAN_ID')
	// 								  ->where('wallet_balance.HRM_ID',$cust_id)
	// 								  ->where('wallet_balance.WALLET_AMOUNT >',0)
	// 								  ->get()->row();

	//print_r($data);

	$interest_rate=$this->db->select('PLAN_INTEREST_RATE')->from('plan_interest')->where('PLAN_ID',$data->PLAN_ID)->get()->row()->PLAN_INTEREST_RATE;
	
	$plan_activation_date=$data->PLAN_ACTIVATION_DATE;
	$no_of_paid_emi=$this->db->from('wallet_balance')
							->where('HRM_ID',$data->HRM_ID)->where('WALLET_AMOUNT',$data->WALLET_AMOUNT)->count_all_results();
	
	$plan_expiry_date=date('d/m/Y',strtotime($data->PLAN_EXPIRY_DATE));
	$reg_no=$data->HRM_REG_NO;
	$next_installment_date=date('d/m/Y',strtotime($data->WALLET_TRANSACTION_TIME."+1 month"));
	
	$name=$data->HRM_TITLE." ".$data->HRM_FIRST_NAME." ".$data->HRM_MIDDLE_NAME." ".$data->HRM_LAST_NAME;
	$plan_id=$data->PLAN_ID;
	$plan_name=$data->PLAN_NAME;
	$redemption_val=($data->PLAN_EMI_AMOUNT*$data->PLAN_EMI_PERIOD);
	$total_redemption_value=$redemption_val+(($interest_rate*$redemption_val)/100);
	$agent_code=$data->HRM_ADDED_BY;	
	$agent=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$agent_code)->get()->row()->HRM_REG_NO;
	$red_period=$data->PLAN_EMI_PERIOD;
	$amount=$data->PLAN_EMI_AMOUNT;
	//$date=$data->WALLET_TRANSACTION_TIME;
	$date = strtotime(date('d-m-Y'). " + 1 month");
	$next_date = date("d-m-Y",$date);
	$new_date=strtotime($data->PLAN_EXPIRY_DATE);
	$red_date=date("d-m-Y",$new_date);
	$cst=$this->db->select('*')->from('hrm')->where('HRM_ID',$_SESSION['current_cust_id'])->get()->row();
	$cust=$cst->HRM_TITLE." ".$cst->HRM_FIRST_NAME." ".$cst->HRM_MIDDLE_NAME." ".$cst->HRM_LAST_NAME;

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
		<link rel="stylesheet" href="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" />   </head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper theme-1-active pimary-color-red">           
			<!-- Main Content -->
			
					<!-- Title -->
					
					<!-- /Title -->
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
							<hr class="light-grey-hr mb-10">
								<div>
									<h2 class="text-center">Emperial Height Agro Producer Company LTD.</h2>
								</div>
								<hr class="light-grey-hr mb-8">
								<div class="clearfix"></div>
							<div class="seprator-block"></div>
								<div class="panel-heading">
									<div class="pull-left">
										<h4 class="panel-title txt-dark">Receipt No:<small ><?php echo $data->INVOICE_NO ;?></small></h4>
										<div class="seprator-block"></div>
										<!--<h6 class="panel-title txt-dark">Installment No:<small >4</small></h6>-->
										<h6 class="panel-title txt-dark">Redemption Value:<small >Rs.<?php echo $total_redemption_value ?> (After APaying All Installments)</small></h6>
										<h6 class="panel-title txt-dark">EMI No : <small ><?php echo $no_of_paid_emi ?></small></h6>
										<h6 class="panel-title txt-dark">Agent Code : <small ><?php echo $agent ?></small></h6>
										<h6 class="panel-title txt-dark">Policy No : <small ><?php echo $data->PLAN_ACTIVATION_ID; ?></small></h6>
										<h6 class="panel-title txt-dark">Plan :<small ><?php echo $plan_name ?></small></h6>
										<h6 class="panel-title txt-dark">Next Installment Date : <small ><?php echo $next_installment_date ?></small></h6>
										<h6 class="panel-title txt-dark">Mode Of Payment: <small >CASH</small></h6>
										<h6 class="panel-title txt-dark">Redemption Period :<small ><?php echo $red_period; ?> MONTHS</small></h6>
										<!--<h6 class="panel-title txt-dark">Rupees in Words :<small >One Thousand Five Hundred Only.</small></h6>-->
										
									</div>
									<div class="pull-right">
									<h6 class="panel-title txt-dark">Redemption Date : <small ><?php echo $plan_expiry_date ?></small></h6>
									<div class="seprator-block"></div>
									<h6 class="panel-title txt-dark">Customer Account No : <small ><?php echo $data->HRM_REG_NO?></small></h6>
									<h6 class="panel-title txt-dark">Installment Amount : <small ><?php echo $amount?></small></h6>
									<h6 class="panel-title txt-dark">Late Payment Charges : <small >Rs.0</small></h6>
									<h6 class="panel-title txt-dark">Total Payble Amount : <small ><?php echo $amount ?></small></h6>
									<h6 class="panel-title txt-dark">Total Amount : <small ><?php echo $amount ?></small></h6>
									<div class="seprator-block"></div>
									<h6 class="panel-title txt-dark">Branch name : <small ><?php echo $data->BRANCH_NAME; ?></small></h6>
									<h6 class="panel-title txt-dark">Transaction Date:<small ><?php echo date('d-m-Y',strtotime($data->WALLET_TRANSACTION_TIME)) ?></small></h6>
									<h6 class="panel-title txt-dark">Received with Thanks From Mr./Mrs.:<small ><?php echo $name ?></small></h6>
									<div class="seprator-block"></div>
									<h5 class="panel-title txt-dark">For Empirial Height Agro Producer Company Ltd. </h5>
									</div>
														
									<div class="clearfix"></div>
								
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					
				</div>
				
				<!-- Footer -->
			
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