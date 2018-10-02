<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_model
{
	public function register_customer($data)
	{
		$last_cust_id=$this->db->select_max('HRM_ID')->from('hrm')->where('HRM_TYPE_ID',4)->get()->row()->HRM_ID;
		$last_cust_reg=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$last_cust_id)->get()->row()->HRM_REG_NO;
		$last_reg_no=(int)substr($last_cust_reg,-6);
		$new_reg_no=(string)$last_reg_no+1;
		$new_registration_no="EMPGHT"."00".(string)$this->generate_reg("","",6,$new_reg_no);


		$emi=$this->db->select('*')->from('plan_emi')->where('PLAN_ID',$data['plan_name'])
															 ->where('PLAN_EMI_AMOUNT',$data['plan_amount'])
															 ->where('PLAN_EMI_PERIOD',$data['plan_duration'])
															 ->get()->row()->PLAN_EMI_ID;

		
		$cust_details=array
			(
				'HRM_TYPE_ID'=>4,
				'RANK_ID'=>0,
				'HRM_TITLE'=>$data['title'],
				'HRM_FIRST_NAME'=>strtoupper($data['fname']),
				'HRM_MIDDLE_NAME'=>strtoupper($data['mname']),
				'HRM_LAST_NAME'=>strtoupper($data['lname']),
				'HRM_ADDRESS'=>$data['address'],
				'HRM_CITY'=>$data['city'],
				'HRM_STATE'=>$data['city'],
				'HRM_COUNTRY'=>$data['city'],
				'HRM_SEX'=>$data['sex'],
				'HRM_NATIONALITY'=>$data['nation'],
				'HRM_CONTACT'=>$data['cont'],
				'HRM_ALT_CONTACT'=>$data['alt_cont'],
				'HRM_EMAIL'=>$data['email'],
				'HRM_PAN'=>$data['pan'],
				'HRM_ADHAAR'=>$data['aadhar'],
				'HRM_GST'=>$data['gst'],
				'HRM_STATUS'=>1,
				'BRANCH_ID'=>$data['branch'],
				'HRM_PROFESSION_ID'=>$data['profession'],
				'HRM_CREDIT_LIMIT'=>$data['credit_lim'],
				'HRM_ACCOUNT_TYPE'=>$data['ac_type'],
				'HRM_REG_DATE'=>$data['reg_date'],
				'HRM_REG_NO'=>$new_registration_no,
				'PLAN_EMI_ID'=>$emi
			);
		$this->db->trans_start();

		$this->db->insert('hrm',$cust_details);
		$cust_id=$this->db->insert_id();

		$nominee_details=array
						(
							'HRM_ID'=>$cust_id,
							'NOMINEE_TITLE'=>$data['nom_title'],	
							'NOMINEE_FIRST_NAME'=>$data['nom_fname'],
							'NOMINEE_MIDDLE_NAME'=>$data['nom_mname'],
							'NOMINEE_LAST_NAME'=>$data['nom_lname'],
							'NOMINEE_AADHAR'=>$data['nom_aadhar'],
							'PROFESSION_ID'=>$data['nom_profession'],
							'NOMINEE_ADDRESS'=>$data['nom_address'],
							'NOMINEE_RELATION'=>$data['nom_relation']
						);

		$this->db->insert('nominee',$nominee_details);

		$date = strtotime($data['reg_date']. " +".$data['plan_duration']." month");
		$exp_date = date("Y-m-d",$date);

		$plan_details=array
					(
						'PLAN_EMI_ID'=>$emi,
						'PLAN_ACTIVATION_DATE'=>$data['reg_date'],
						'PLAN_EXPIRY_DATE'=>$exp_date,
						'PLAN_ACTIVATION_STATUS'=>1,
						'CUSTOMER_ID'=>$cust_id
					);

		$this->db->insert('plan_activation',$plan_details);
		$plan_act_id=$this->db->insert_id();

		$relation_details=array
						(
							'NEW_HRM_ID'=>$cust_id,
							'HRM_PARENT_ID'=>$data['add_under'],
							'HRM_ADDED_BY'=>$data['added_by']
						);

		$this->db->insert('hrm_relation',$relation_details);
		$receipt=$this->db->select_max('RECEIPT_ID')->from('wallet_details')->get()->row()->RECEIPT_NO;
		$receipt=$receipt+1;
		$wallet_details=array
						(
							'RECEIPT_NO'=>$receipt,
							'WALLET_AMOUNT'=>(-1)*$data['plan_amount'],
							'WALLET_TRANSACTION_METHOD'=>"PLAN PURCHASE",
							'HRM_ID'=>$cust_id,
							'PLAN_ACTIVATION_ID'=>$plan_act_id,
							'WALLET_REMARK'=>"Purchase a plan of ".$data['plan_amount']." Rupees",
						);
		$this->db->insert('wallet_balance',$wallet_details);

		$this->db->trans_complete();

		echo "<script>alert('inserted');window.location='index'</script>";
	}

	public function register_branch()
	{
		$last_branch_id=$this->db->select_max('BRANCH_ID')->from('branch')->get()->row()->BRANCH_ID;
		$last_reg_no=$this->db->select('BRANCH_REG_NO')->from('branch')->where('BRANCH_ID',$last_branch_id)->get()->row()->BRANCH_REG_NO;
		$last_registration_no=(int)substr($last_reg_no, -6);
		$new_registration_no=(string)$last_registration_no+1;
		$registration_no=$this->generate_reg($_POST['prefix'],"00",6,$new_registration_no);

		$details=array
					(
						'BRANCH_REG_NO'=>$registration_no,
						'BRANCH_NAME'=>$_POST['branch_name'],
						'BRANCH_ADDRESS'=>$_POST['address'],
						'BRANCH_CITY'=>$_POST['city'],
						'BRANCH_STATE'=>$_POST['city'],
						'BRANCH_COUNTRY'=>$_POST['city'],
						'BRANCH_CONTACT'=>$_POST['contact'],
						'BRANCH_ALT_CONTACT'=>$_POST['alt_cont'],
						'BRANCH_PHONE'=>$_POST['phone'],
						'BRANCH_TARGET'=>$_POST['target'],
						'BRANCH_USERNAME'=>$_POST['user'],
						'BRANCH_PASSWORD'=>$_POST['pass'],
						'BRANCH_REG_DATE'=>$_POST['reg_date'],
						'COMPANY_ID'=>$_POST['company'],
						'BRANCH_CATEGORY_ID'=>$_POST['category']
					);
		$this->db->insert('branch',$details);
		echo "<script>alert('NEW BRANCH ADDED!');window.location='index'</script>";
	}

	public function generate_reg($prefix,$rank,$length,$num)
	{
		$num_length=strlen($num);
	 	$required_length=$length-$num_length;
	 	$z="";
	 	for ($i=0; $i <$required_length ; $i++) 
	 	{ 
	 		$z=$z."0";
	 	}
	 	return $prefix.$rank.$z.$num;
	}
}