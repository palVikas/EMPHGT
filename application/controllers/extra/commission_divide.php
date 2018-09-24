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
		$this->db->insert('wallet_balance',$details);

		$added_by_id_1=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$hrm_id)->get()->row()->HRM_ADDED_BY;

		$rank_id_1=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$added_by_id_1)->get()->row()->RANK_ID;

		$basic_commission_rate_1=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id_1)->get()->row()->RANK_AGENT_COMMISSION;


		$added_by_id_2=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$added_by_id_1)->get()->row()->HRM_ADDED_BY;

		$rank_id_2=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$added_by_id_2)->get()->row()->RANK_ID;
		
		$basic_commission_rate_2=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id_2)->get()->row()->RANK_AGENT_COMMISSION;

		$x1=$added_by_id_1;
		$x2=$added_by_id_2;

		while($x1 != $x2)			
		{			
			echo "<script>alert(".$added_by_id_1 .$added_by_id_2.")</script>";

			$rank_id_1=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$added_by_id_1)->get()->row()->RANK_ID;

			$commission_rate_1=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id_1)->get()->row()->RANK_AGENT_COMMISSION;


			$rank_id_2=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$added_by_id_2)->get()->row()->RANK_ID;

			$commission_rate_2=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id_2)->get()->row()->RANK_AGENT_COMMISSION;

			$total_commission=($commission_rate_2-$commission_rate_1)*($amt/100);

			$wallet_details=array
								(
									'WALLET_AMOUNT'=>$total_commission,
									'WALLET_TRANSACTION_METHOD'=>5,
									'HRM_ID'=>$added_by_id_1,
									'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
									'WALLET_REMARK'=>'Multi level commission'
								);	

			$this->db->insert('wallet_balance',$wallet_details);

			$x1=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$added_by_id_2)->get()->row()->HRM_ADDED_BY;
			$x2=$added_by_id_2;

			$added_by_id_1=$added_by_id_2;

			$added_by_id_2=$this->db->select('HRM_ADDED_BY')->from('hrm_relation')->where('NEW_HRM_ID',$added_by_id_1)->get()->row()->HRM_ADDED_BY;		
			
		}

		$rank_id=$this->db->select('RANK_ID')->from('hrm')->where('RANK_ID',$added_by_id_2)->get()->row()->RANK_ID;
		$commission_rate=$this->db->select('RANK_AGENT_COMMISSION')->from('rank')->where('RANK_ID',$rank_id)->get()->row()->RANK_AGENT_COMMISSION;

		$total_commission=($commission_rate-$basic_commission_rate_1)*($amt/100);

		$wallet_details=array
						(
							'WALLET_AMOUNT'=>$total_commission,
							'WALLET_TRANSACTION_METHOD'=>5,
							'HRM_ID'=>$added_by_id_2,
							'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
							'WALLET_REMARK'=>'Multi level commission'
						);	

		$this->db->insert('wallet_balance',$wallet_details);

		$this->invoice_view($hrm_id);
		$this->load->view('header');
		$this->load->view('invoice_details');
		$this->load->view('footer');


	}

	public function invoice_view($data)
	{
		//$data=$_POST['data'];
		$this->load->model('getting_invoice_details');
		$details=$this->getting_invoice_details->get_details($data);
		$this->load->view('header');
		$this->load->view('invoice_details' , $details);
		$this->load->view('footer');
	}
}