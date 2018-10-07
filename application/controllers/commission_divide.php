<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission_divide extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		if($this->session->userdata['agro_p_signed_in']==''){
			redirect('login/index');
		}
		$this->load->helper('gernal_helper');
	}
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
				 	'WALLET_REMARK'=>"Payment successfull of plan worth rupees ".$amt,
					'WALLET_TRANSACTION_TIME'=>$_POST['date']
					
				 );
		$this->db->insert('wallet_balance',$details);
	}

	public function comission_pay()
	{
		$member_id=$_SESSION['current_cust_id'];
		$amt=(-1)*($_POST['amount']);
		$receipt_no=$_POST['receipt_no'];
		$last_invoice_no=$this->db->select_max('RECEIPT_NO')->from('wallet_balance')->get()->row()->RECEIPT_NO;
		$invoice=$last_invoice_no+1;

		$details=array
		(
			'WALLET_AMOUNT'=>$amt,
			'WALLET_TRANSACTION_METHOD'=>$_POST['type'],
			'RECEIPT_NO'=>$receipt_no,
			'HRM_ID'=>$_POST['hrm_id'],
			'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
			'WALLET_REMARK'=>"Payment successfull of plan worth rupees ".$amt,
			'WALLET_TRANSACTION_TIME'=>$_POST['date']
		);
		$this->db->insert('wallet_balance',$details);
		$wallet_id=$this->db->insert_id();
		
		/*for getting current ledger of customer and update the ledger amount */
		$ledger_dt=get_ledger_name("customer_".$_POST['hrm_id']);
		
		$customer_ldgr_amnt=$ledger_dt[0]->AMOUNT;
		$drid=$ledger_dt[0]->ID;
		$curent_updated_amount=$customer_ldgr_amnt+$amt;
		update_amount_ledger($drid,$curent_updated_amount);
		
		$detail_hrm=get_hrm_full($_POST['hrm_id']);
		$br_id=$detail_hrm[0]->BRANCH_ID;
		$first_name=$detail_hrm[0]->HRM_FIRST_NAME;
		$contact=$detail_hrm[0]->HRM_CONTACT;
		if($_POST['type']==1){
			$type="cash";
			$crid=3;
			$ledger_dt=get_ledger_dt_by_id(3);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$curent_updated_amount_comp=$com_ldger_amt+$amt;
			update_amount_ledger(3,$curent_updated_amount_comp);
		}
		else if($_POST['type']==2){
			$type="cheque";
			$crid=6;
			$ledger_dt=get_ledger_dt_by_id(6);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$curent_updated_amount_comp=$com_ldger_amt+$amt;
			update_amount_ledger(6,$curent_updated_amount_comp);
		}else{
			$type="Demand draft";
			$crid=7;
			$ledger_dt=get_ledger_dt_by_id(7);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$curent_updated_amount_comp=$com_ldger_amt+$amt;
			update_amount_ledger(7,$curent_updated_amount_comp);
		}
		$plan_name=get_plan_dt($_POST['plan_act_id']);
		$plan_name=$plan_name[0]->PLAN_NAME;
		$particular="being ".$type." paid to company for rs.".$amt." for ".$plan_name;
		$dt=$_POST['date'];
		$comp_id=1;
		$hrm_added_by_fr_record=$this->find_sponcer_id($member_id);
		insert_record_transaction($drid,$crid,$br_id,$hrm_added_by_fr_record,$particular,$amt,$dt,$comp_id);
		$message="Dear ".ucwords($first_name)." your amount for Rs. ".$amt." has been successfully received";
		send_message($contact,$message);
		
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
									'WALLET_TRANSACTION_METHOD'=>"5",
									'HRM_ID'=>$sponcer_id,
									'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
									'WALLET_REMARK'=>'Multi level commission',
									'WALLET_TRANSACTION_TIME'=>$_POST['date']
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
							'WALLET_TRANSACTION_METHOD'=>"5",
							'HRM_ID'=>$sponcer_id,
							'PLAN_ACTIVATION_ID'=>$_POST['plan_act_id'],
							'WALLET_REMARK'=>'Multi level commission',
							'WALLET_TRANSACTION_TIME'=>$_POST['date']
						);	

		$this->db->insert('wallet_balance',$wallet_details);

		echo "<script>alert('Customer payment received successfully!'); window.location='../admin/customer/invoice_details_customer/".$wallet_id."';</script>";
	}

	public function invoice_view()
	{
		$id=$this->uri->segment(3);
		$this->load->model('Getting_invoice_details');
		//$details['data']=$this->getting_invoice_details->get_details($_SESSION['current_cust_id']);
		$data['data']=$this->Getting_invoice_details->print_invoice($id);
		$this->load->view('invoice_details1', $data);
	}	
}