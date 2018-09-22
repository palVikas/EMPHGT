<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission_divide extends CI_Controller 
{
	public function new_function()
	{
		$hrm_id=$_POST['hrm_id'];
		$amt=(-1)*($_POST['amount']);

		$details=array
				 (
				 	'WALLET_AMOUNT'=>$amt,
				 	'WALLET_TRANSACTION_METHOD'=>$_POST['type'],
				 	'HRM_ID'=>$_POST['hrm_id'],
				 	'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
				 	'WALLET_REMARK'=>"Payment successfull of plan worth rupees ".$amt
				 );
		//$this->db->insert('wallet_balance',$details);

		$added_by_id=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$hrm_id)->get()->row()->HRM_ADDED_BY;

		$added_by_id_2=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$getting_added_by)->get()->row()->HRM_ADDED_BY;

		$rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$getting_added_by)->get()->row()->RANK_ID;
		
		$basic_commission_rate=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id)->get()->row()->RANK_AGENT_COMMISSION;

		//$commission_amount=$amt*$basic_commission_rate;

		$current_child=$hrm_id;
		$current_added_by=$getting_added_by;

		while($current_child != $current_added_by)			
		{
			
			echo "<script>alert(".$current_child .$current_added_by.")</script>";


			$added_by_rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$current_added_by)->get()->row()->RANK_ID;
			$added_by_commission_rate=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$added_by_rank_id)->get()->row()->RANK_AGENT_COMMISSION;



			$child_rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$current_child)->get()->row()->RANK_ID;
			$child_commission_rate=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$child_rank_id)->get()->row()->RANK_AGENT_COMMISSION;


			$total_commission=($added_by_commission_rate-$child_commission_rate)*($amt/100);

			$wallet_details=array
								(
									'WALLET_AMOUNT'=>$total_commission,
									'WALLET_TRANSACTION_METHOD'=>5,
									'HRM_ID'=>$current_added_by,
									'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
									'WALLET_REMARK'=>'Multi level commission'
								);	

			$this->db->insert('wallet_balance',$wallet_details);

			$current_child=$current_added_by;

			$current_added_by=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$current_added_by)->get()->row()->HRM_ADDED_BY;			
			
		}

			$total_commission=($added_by_commission_rate-$basic_commission_rate)*($amt/100);
			$wallet_details=array
								(
									'WALLET_AMOUNT'=>$total_commission,
									'WALLET_TRANSACTION_METHOD'=>5,
									'HRM_ID'=>$current_added_by,
									'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
									'WALLET_REMARK'=>'Multi level commission'
								);	

			$this->db->insert('wallet_balance',$wallet_details);


	}
}