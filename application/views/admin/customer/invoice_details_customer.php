<?php

	$this->load->helper('gernal_helper');
	$plan_interest_id=$this->db->select('PLAN_INTEREST_ID')->from('plan')->where('PLAN_ID',$data->PLAN_ID)->get()->row()->PLAN_INTEREST_ID;
	$interest_rate=$this->db->select('PLAN_INTEREST_RATE')->from('plan_interest')->where('PLAN_INTEREST_ID',$plan_interest_id)->get()->row()->PLAN_INTEREST_RATE;

	$bonus_type_id=$this->db->select('BONUS_TYPE_ID')->from('plan')->where('PLAN_ID',$data->PLAN_ID)->get()->row()->BONUS_TYPE_ID;
	$bonus_interest_rate=$this->db->select('BONUS_TYPE_AMOUNT')->from('bonus_type')->where('BONUS_TYPE_ID',$bonus_type_id)->get()->row()->BONUS_TYPE_AMOUNT;
	
	
	$plan_activation_date=$data->PLAN_ACTIVATION_DATE;
	$no_of_paid_emi=$this->db->from('wallet_balance')
							->where('HRM_ID',$data->HRM_ID)->where('WALLET_AMOUNT',$data->WALLET_AMOUNT)->count_all_results();
	
	$plan_expiry_date=date('d/m/Y',strtotime($data->PLAN_EXPIRY_DATE));
	$reg_no=$data->HRM_REG_NO;
	$next_installment_date=date('d/m/Y',strtotime($data->WALLET_TRANSACTION_TIME."+1 month"));
	
	$name=$data->HRM_TITLE." ".$data->HRM_FIRST_NAME." ".$data->HRM_MIDDLE_NAME." ".$data->HRM_LAST_NAME;
	$plan_id=$data->PLAN_ID;
	$plan_name=$data->PLAN_NAME;
	
	$agent_code=$data->HRM_ADDED_BY;	
	$agent=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$agent_code)->get()->row()->HRM_REG_NO;
	$red_period=$data->PLAN_EMI_PERIOD;
	$amount=$data->PLAN_EMI_AMOUNT;
	$amount_in_words=get_money_in_words($amount)." Rupees";
	
	$date = strtotime(date('d-m-Y'). " + 1 month");
	$next_date = date("d-m-Y",$date);
	$new_date=strtotime($data->PLAN_EXPIRY_DATE);
	$red_date=date("d-m-Y",$new_date);
	$cst=$this->db->select('*')->from('hrm')->where('HRM_ID',$data->HRM_ID)->get()->row();
	$cust=$cst->HRM_FIRST_NAME." ".$cst->HRM_MIDDLE_NAME." ".$cst->HRM_LAST_NAME;
	$address=$cst->HRM_ADDRESS;

	$plan_emi_category=$this->db->select('PLAN_TYPE_PLAN')->from('plan_type')->where('PLAN_TYPE_ID',$data->PLAN_TYPE_ID)->get()->row()->PLAN_TYPE_PLAN;
	if($plan_emi_category == 1)
	{
		$next_installment_date	= "No Reneval Needed";
		$total_redemption_value=$amount+(($amount*$interest_rate)/100);
		$bonus_amount=($amount*$bonus_interest_rate)/100;
	}
	else
	{
		$redemption_val=($data->PLAN_EMI_AMOUNT*$data->PLAN_EMI_PERIOD);
		$bonus_amount=$redemption_val*($bonus_interest_rate/100);
		$total_redemption_value=$redemption_val+(($interest_rate*$redemption_val)/100);
	}

?>


         <div class="page-wrapper">
       		<div class="container-fluid">
       			  		<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
							<hr class="light-grey-hr mb-10">
								<div>
									<h2 class="text-center">Emperial Height Agro Producer Company LTD.</h2>
								</div>
								<hr class="light-grey-hr mb-8">
								<div class="clearfix"></div>
							
								<div class="panel-heading">
									<div class="pull-left">
										<h4 class="panel-title txt-dark">Receipt No:<small ><?php echo $data->RECEIPT_NO ;?></small></h4>
										<br><br>
										<h6 class="panel-title txt-dark">Installment No : <small ></small></h6>
										<h6 class="panel-title txt-dark">Received With Thanks From MR./MRS : <small ><?php echo $cust; ?></small></h6>
										<h6 class="panel-title txt-dark">Address : <small ><?php echo $address ?></small></h6>
										<h6 class="panel-title txt-dark">Agent Code : <small ><?php echo $agent ?></small></h6>
										<h6 class="panel-title txt-dark" style="width : 50%; float: left;">Policy No : <small ><?php echo $data->PLAN_ACTIVATION_ID; ?></small></h6>
										<h6 class="panel-title txt-dark" style="width : 50%; float: right;">Plan : <small ><?php echo $plan_name; ?></small></h6>
										<h6 class="panel-title txt-dark">Next Installment Date :<small ><?php echo $next_installment_date ?></small></h6>
										<h6 class="panel-title txt-dark" style="width : 50%; float: left">Mode Of Payment : <small ><?php echo $data->WALLET_TRANSACTION_METHOD ?></small></h6>
										<h6 class="panel-title txt-dark" style="width : 50%; float: right">Redemption Period : <small ><?php echo $red_period." Months" ?></small></h6>
										<h6 class="panel-title txt-dark">Rupees In Words : <small ><?php echo $amount_in_words; ?></small></h6>
										<h6 class="panel-title txt-dark" style="width: 50%; float : left">Redemption Value :<small ><?php echo $total_redemption_value; ?></small></h6>
										<h6 class="panel-title txt-dark" style="width: 50%; float : right">Loyalty Bonus Value :<small ><?php echo $bonus_amount; ?></small></h6>
										<h6 style="width : 50%; float:left;"><small>(After paying all installments)</small></h6>
										<h6 style="width : 50%; float:right;"><small>(Extra Bonus After paying all installments)</small></h6>
										<h6 class="panel-title txt-dark">Accumulated Amount Till Date :<small >One Thousand Five Hundred Only.</small></h6>										
									</div>
									<div class="pull-right">
										<h6 class="panel-title txt-dark">Date : <small ><?php echo date('d-m-Y',strtotime($data->WALLET_TRANSACTION_TIME))?></small></h6>
										<br><br>
										<h6 class="panel-title txt-dark">Branch : <small ><?php echo $data->BRANCH_NAME ?></small></h6>
										<br>
										<h6 class="panel-title txt-dark">Membership Code : <small ><?php echo $data->HRM_REG_NO?></small></h6>
										<h6 class="panel-title txt-dark">Installment Amount : <small ><?php echo $amount?> Rs.</small></h6>
										<h6 class="panel-title txt-dark">Penalty : <small >0 Rs.</small></h6>
										<h6 class="panel-title txt-dark">Total Payable Amount : <small ><?php echo $amount." Rs." ?></small></h6>										
										<br><br>
										<h6 class="panel-title txt-dark">Redemption Date : <small ><?php echo $plan_expiry_date; ?></small></h6>

										
										<div class="seprator-block"></div>
										
									</div>

														
									<div class="clearfix"></div>
								
								</div>
								<h5 class="panel-title txt-dark" style="float:right">For Empirial Height Agro Producer Company Ltd. </h5>
							</div>
						</div>
				</div>
       		</div>
         </div>
			<!-- Main Content -->
					<!-- Row -->
				
					<!-- /Row -->
		
			
	
		
	</body>

<!-- Mirrored from hencework.com/theme/doodle/full-width-light/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 11:16:43 GMT -->
</html>