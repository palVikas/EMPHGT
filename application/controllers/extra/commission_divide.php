<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission_divide extends CI_Controller
{

	public function find_sponcer_id($sponcer_id){

		$sponcer_id=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$sponcer_id)->get()->row()->HRM_ADDED_BY;
		return  $sponcer_id;
	}

	public function find_rank_id($sponcer_id)
	{
		$sponcer_rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$sponcer_id)->get()->row()->RANK_ID;
		return $sponcer_rank_id;
	}

	public function get_commission($plan_id,$rank_id)
	{
		$commission=$this->db->select('*')->from('plan_rank_commission')
										  ->where('PLAN_ID',$plan_id)
										  ->where('RANK_ID',$rank_id)->get()->row();

		return $commission->PLAN_RANK_COMMISSION;
	}

	public function insert_commission($plan_id,$rank_id)
	{
		$details=array
				 (
				 	'WALLET_AMOUNT'=>$amt,
				 	'WALLET_TRANSACTION_METHOD'=>$_POST['type'],
				 	'HRM_ID'=>$_POST['hrm_id'],
				 	'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
				 	'WALLET_REMARK'=>"Payment successfull of plan worth rupees ".$amt
				 );
		$this->db->insert('wallet_balance',$details);
	}

	public function new_function()
	{
		$member_id=$_SESSION['current_cust_id'];
		$amt=(-1)*($_POST['amount']);

		$details=array
				 (
				 	'WALLET_AMOUNT'=>$amt,
				 	'WALLET_TRANSACTION_METHOD'=>$_POST['type'],
				 	'HRM_ID'=>$_POST['hrm_id'],
				 	'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
				 	'WALLET_REMARK'=>"Payment successfull of plan worth rupees ".$amt
				 );
		$this->db->insert('wallet_balance',$details);

		$plan_id=$this->db->select('HRM_ACCOUNT_TYPE')->from('hrm')->where('HRM_ID',$member_id)->get()->row()->HRM_ACCOUNT_TYPE;

		$sponcer_id=$this->find_sponcer_id($member_id);

		$rank_id=$this->find_rank_id($sponcer_id);

		$basic_commission_rate_1=$this->get_commission($plan_id,$rank_id);


		$added_by_id_2=$this->find_sponcer_id($sponcer_id);

		$rank_id_2=$this->find_rank_id($added_by_id_2);

		$basic_commission_rate_2=$this->get_commission($plan_id,$rank_id_2);
		
		$x1=$member_id;
		$x2=$sponcer_id;

		while($x1 != $x2)			
		{
			$rank_id_1=$this->find_rank_id($member_id);

			$commission_rate_1=$this->get_commission($plan_id,$rank_id_1);

			$rank_id_2=$this->find_rank_id($sponcer_id);

			$commission_rate_2=$this->get_commission($plan_id,$rank_id_2);
			$total_commission=($commission_rate_2-$commission_rate_1)*($amt/100);
			$wallet_details=array
								(
									'WALLET_AMOUNT'=>$total_commission,
									'WALLET_TRANSACTION_METHOD'=>5,
									'HRM_ID'=>$sponcer_id,
									'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
									'WALLET_REMARK'=>'Multi level commission'
								);	

								
			$this->db->insert('wallet_balance',$wallet_details);

			$x1=$this->find_sponcer_id($sponcer_id);
			$x2=$this->find_sponcer_id($x1);

			$member_id=$sponcer_id;

			$sponcer_id=$this->find_sponcer_id($member_id);			
		}
		$rank_id=$this->find_rank_id($sponcer_id);
		$commission_rate=$this->get_commission($plan_id,$rank_id);
	
		$total_commission=($commission_rate-$basic_commission_rate_1)*($amt/100);
		$wallet_details=array
						(
							'WALLET_AMOUNT'=>$total_commission,
							'WALLET_TRANSACTION_METHOD'=>5,
							'HRM_ID'=>$sponcer_id,
							'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
							'WALLET_REMARK'=>'Multi level commission'
						);	

		$this->db->insert('wallet_balance',$wallet_details);

		echo "<script>alert('PAYMENT RECEIVED');window.location='invoice_view'</script>";
	}

	public function invoice_view()
	{
		
		$this->load->model('getting_invoice_details');
		$details['data']=$this->getting_invoice_details->get_details($_SESSION['current_cust_id']);
		$this->load->view('invoice_details1' , $details);
	}	
}