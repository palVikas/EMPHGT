<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		
		$this->load->helper('gernal_helper');
	}

	public function login_check(){
		
		$login_type=$_POST['login_type'];
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];
		if($login_type==1){
			$query=$this->db->query("select * from branch where BRANCH_USERNAME='".$user_name."' and BRANCH_PASSWORD='".$password."'");
			$this->session->set_userdata('agro_p_signed_in', 'branch');
		}
		else if($login_type==2){
			$query=$this->db->query("select * from hrm where HRM_USERNAME='".$user_name."' and HRM_PASSWORD='".$password."'");
			$this->session->set_userdata('agro_p_signed_in', 'agent');
		}
		else{
			$query=$this->db->query("select * from admin where USERNAME='".$user_name."' and PASSWORD='".$password."'");
			$this->session->set_userdata('agro_p_signed_in', 'admin');
		}
		 if($query->num_rows()>0){
			echo 'err';
		 }else{
			echo 'ok';
		 }
		
	}
	public function cust_list()
	{		
		$this->load->library('Datatables');

		$this->datatables->select('*,SUM(WALLET_AMOUNT) as sum,RECEIPT_NO,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')->from('hrm')
									  ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  ->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4);

		echo $this->datatables->generate();
	}

	public function customer_details()
	{
		$_SESSION['current_cust_id']=$_POST['reg'];
		$id=$_POST['reg'];
		$data=$this->db->select('*,SUM(WALLET_AMOUNT) as sum')->from('hrm')
								    ->where('hrm.HRM_ID',$id)
								    ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								    ->group_by('wallet_balance.HRM_ID')
								    ->get()->row();

		echo json_encode($data);

	}
	public function pay_agent()
	{
		$hrm_id=$_POST['hrm_id'];
		$name=$_POST['name'];
		$amount=$_POST['amount'];
		$type=$_POST['type'];
		$date=$_POST['date'];
		
		if($type==1){
			$type_paid="cash";
			$crid=3;
			$get_paid_type=$crid;
			$ledger_dt=get_ledger_dt_by_id(3);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$updated_amt_comp=$com_ldger_amt+$amount;
			update_amount_ledger(3,$updated_amt_comp);
		}
		else if($type==2){
			$type_paid="cheque";
			$crid=6;
			$get_paid_type=$crid;
			$ledger_dt=get_ledger_dt_by_id(6);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$updated_amt_comp=$com_ldger_amt+$amount;
			update_amount_ledger(6,$updated_amt_comp);
		}else{
			$type_paid="Demand draft";
			$crid=7;
			$get_paid_type=$crid;
			$ledger_dt=get_ledger_dt_by_id(7);
			$com_ldger_amt=$ledger_dt[0]->AMOUNT;
			$updated_amt_comp=$com_ldger_amt+$amount;
			update_amount_ledger(7,$updated_amt_comp);
		}
		$ledger_dt_comission=get_ledger_dt_by_id(9);
		$ledger_dt_comission=$ledger_dt_comission[0]->AMOUNT;
		$comission_company_paid=$ledger_dt_comission+((-1)*$amount);
		update_amount_ledger(9,$comission_company_paid);
		/*entry company to comission */
		$drid=9;
		$hrm_details=get_hrm_full($hrm_id);
		$br_id=$hrm_details[0]->BRANCH_ID;
		$particular="being comission paid by ".$type_paid." for rs.".$comission_company_paid;
		$comp_id=1;
		insert_record_transaction($drid,$crid,$br_id,$hrm_id,$particular,$comission_company_paid,$date,$comp_id);
		
		/*record for comission to agent */
		$ledger_dt_advisor_full=get_ledger_name("advisor_".$hrm_id);
		$ledger_dt_advisor=$ledger_dt_advisor_full[0]->AMOUNT;
		$ledger_advisor_id=$ledger_dt_advisor_full[0]->ID;
		$amount_for_advisor=$comission_company_paid+$ledger_dt_advisor;
		/*update amount for advisor comission */
		update_amount_ledger($ledger_advisor_id,$amount_for_advisor);
		/*update amount for comission company */
		$comission_company_rem=0;
		update_amount_ledger(9,$comission_company_rem);
		$crid=9;
		$drid=$ledger_advisor_id;
		$name_hrm=$hrm_details[0]->HRM_FIRST_NAME." ".$hrm_details[0]->HRM_MIDDLE_NAME." ".$hrm_details[0]->HRM_LAST_NAME;
		$contact=$hrm_details[0]->HRM_CONTACT;
		$particular="being comission paid to ".$name_hrm." for rs.".$comission_company_paid;
		insert_record_transaction($drid,$crid,$br_id,$hrm_id,$particular,$comission_company_paid,$date,$comp_id);
		$message="Dear ".ucwords($hrm_details[0]->HRM_FIRST_NAME)." your comission amount for Rs. ".$comission_company_paid." has been successfully delivered";
		send_message($contact,$message);
		
		/*code for updating the values for parent hrms */
		$all_plan_act_id=$this->db->query("select * from wallet_balance where HRM_ID='".$hrm_id."'");
		$all_plan_act_id=$all_plan_act_id->result();
		$all_plan_array=array();
		foreach($all_plan_act_id as $all_plan){
			$all_plan_array[]=$all_plan->PLAN_ACTIVATION_ID;
		}
		$all_plan_array=array_unique($all_plan_array);
		//print_r($all_plan_array);
		$check=0;
		$x=0;
		$all_hrm=array();
		while($x!=1){
			if($check==0){
				$id=find_parent_hrms($hrm_id);
			}else{
				$id=find_parent_hrms($id);
			}
			$check=1;
			$all_hrm[]=$id;
			if($id==1){
				$x=1;
			}
		}
		$big_array=array();
		foreach($all_plan_array as $plan_act){
			foreach($all_hrm as $hrms){
				$small_array=array();
				$particular_hrm_amount=$this->db->query("select * from wallet_balance where HRM_ID='".$hrms."' and PLAN_ACTIVATION_ID='".$plan_act."'");
				$particular_hrm_amount=$particular_hrm_amount->result();
				$sum=0;
				foreach($particular_hrm_amount as $amounts){
					$sum+=$amounts->WALLET_AMOUNT;
				}
				$small_array['id']=$hrms;
				$small_array['amount']=$sum;
				array_push($big_array,$small_array);
			}
		}
	
		$check_array=array();
		$main_last_array=array();
		foreach($big_array as $count){
			
			if(in_array($count['id'],$check_array)){
				$amt=$this->get_value_by_key_array($main_last_array,$count['id']);
				$total_amt=$count['amount']+$amt;
				$key_no=$this->get_key_array($main_last_array,$count['id']);
				$main_last_array[$key_no]['amount']=$total_amt;
				
			}else{
				$sm_array=array();
				$check_array[]=$count['id'];
				$sm_array['id']=$count['id'];
				$sm_array['amount']=$count['amount'];
				array_push($main_last_array,$sm_array);
			}
		}
		
		/* getting previous paid values for particular agent */
		unset($big_array); 
		$big_array = array(); 
		unset($small_array); 
		foreach($all_hrm as $hrms){
			$small_array=array();
			$lder_dt=get_ledger_name("advisor_".$hrms);
			$particular_hrm_amount=$this->db->query("select * from accounts where HRM_ID='".$hrm_id."' and DR_ID='".$lder_dt[0]->ID."'");
			$particular_hrm_amount=$particular_hrm_amount->result();
			$sum=0;
			foreach($particular_hrm_amount as $amounts){
				$sum+=$amounts->AMOUNT;
			}
			$small_array['id']=$hrms;
			$small_array['amount']=$sum;
			array_push($big_array,$small_array);
		}
		
		$last_array_final=array();
		foreach($main_last_array as $arr){
			$last_min_array=array();
			$amount1=$this->get_value_by_key_array($main_last_array,$arr['id']);
			$amount2=$this->get_value_by_key_array($big_array,$arr['id']);
			$net_amount=$amount1-$amount2;
			$last_min_array['id']=$arr['id'];
			$last_min_array['amount']=$net_amount;
			array_push($last_array_final,$last_min_array);
		}
		/* to update ledger values */
		$amt_given=0;
		foreach($last_array_final as $last){
			$lder_dt=get_ledger_name("advisor_".$last['id']);
			$prev_amt=$lder_dt[0]->AMOUNT;
			$id=$lder_dt[0]->ID;
			$tot_amt=$prev_amt+$last['amount'];
			update_amount_ledger($id,$tot_amt);
			$amt_given+=$last['amount'];
			
			$crid=$get_paid_type;
			$drid=9;
			$hrm_details=get_hrm_full($last['id']);
			$br_id=$hrm_details[0]->BRANCH_ID;
			$particular="being comission paid by ".$type_paid." for rs.".$last['amount'];
			$comp_id=1;
			insert_record_transaction($drid,$crid,$br_id,$hrm_id,$particular,$last['amount'],$date,$comp_id);
			$name_hrm=$hrm_details[0]->HRM_FIRST_NAME." ".$hrm_details[0]->HRM_MIDDLE_NAME." ".$hrm_details[0]->HRM_LAST_NAME;
			$particular="being comission paid to ".$name_hrm." for rs.".$last['amount'];
			insert_record_transaction($id,9,$br_id,$hrm_id,$particular,$last['amount'],$date,$comp_id);
			$contact=$hrm_details[0]->HRM_CONTACT;
			$message="Dear ".ucwords($hrm_details[0]->HRM_FIRST_NAME)." your comission amount for Rs. ".$last['amount']." has been successfully delivered";
			send_message($contact,$message);
			
		}
		$ledger_dt=get_ledger_dt_by_id($get_paid_type);
		$com_ldger_amt=$ledger_dt[0]->AMOUNT;
		$updated_amt_comp=$com_ldger_amt-$amt_given;
		update_amount_ledger($get_paid_type,$updated_amt_comp);
			
		echo "err";
	}
	
	public function get_value_by_key_array($main_last_array,$count_id){
			foreach($main_last_array as $val){
				if($val['id']==$count_id){
					return $val['amount'];
					break;
				}
			}
	}
	public function get_key_array($main_last_array,$count_id){
			foreach($main_last_array as $key=>$val){
				if($val['id']==$count_id){
					return $key;
					break;
				}
			}
	}
	public function register_branch()
	{
		$last_branch_id=$this->db->select_max('BRANCH_ID')->from('branch')->get()->row()->BRANCH_ID;
		$last_reg_no=$this->db->select('BRANCH_REG_NO')->from('branch')->where('BRANCH_ID',$last_branch_id)->get()->row()->BRANCH_REG_NO;
		$last_registration_no=(int)substr($last_reg_no, -6);
		$new_registration_no=(string)$last_registration_no+1;
		$registration_no=generate_reg($_POST['prefix'],"00",6,$new_registration_no);

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
		echo "err";
	}
	public function update_branch()
	{
		
		$details=array
					(
						'BRANCH_NAME'=>$_POST['branch_name'],
						'BRANCH_ADDRESS'=>$_POST['address'],
						'BRANCH_CITY'=>$_POST['city'],
						'BRANCH_STATE'=>$_POST['city'],
						'BRANCH_COUNTRY'=>$_POST['city'],
						'BRANCH_CONTACT'=>$_POST['contact'],
						'BRANCH_ALT_CONTACT'=>$_POST['alt_cont'],
						'BRANCH_PHONE'=>$_POST['phone'],
						'BRANCH_TARGET'=>$_POST['target'],
						'BRANCH_PASSWORD'=>$_POST['pass'],
						
						'COMPANY_ID'=>$_POST['company'],
						'BRANCH_CATEGORY_ID'=>$_POST['category']
					);
		$this->db->where('BRANCH_REG_NO',$_POST['reg_id']);	
		$this->db->update('branch',$details);
		echo "err";
	}

	public function update_advisor()
	{
		
		$details=array
					(
						'RANK_ID'=>$_POST['rank'],
						'HRM_TITLE'=>$_POST['title'],
						'HRM_FIRST_NAME'=>$_POST['fname'],
						'HRM_MIDDLE_NAME'=>$_POST['mname'],
						'HRM_LAST_NAME'=>$_POST['lname'],
						'HRM_PROFESSION_ID'=>$_POST['profession'],
						'HRM_ADDRESS'=>$_POST['address'],
						'HRM_CITY'=>$_POST['city'],
						'HRM_STATE'=>$_POST['city'],
						'HRM_COUNTRY'=>$_POST['city'],						
						'HRM_NATIONALITY'=>$_POST['nation'],
						'HRM_CONTACT'=>$_POST['cont'],
						'HRM_ALT_CONTACT'=>$_POST['alt_cont'],
						'HRM_EMAIL'=>$_POST['email'],
						'HRM_PAN'=>$_POST['pan'],
						'HRM_ADHAAR'=>$_POST['aadhar'],
						'HRM_GST'=>$_POST['gst']
					);
		$this->db->where('HRM_ID',$_POST['hrm_id']);	
		$this->db->update('hrm',$details);
		echo "err";
	}
	
	public function register_advisor()
	{
		$last_adv_id=$this->db->select_max('HRM_ID')->from('hrm')->where('HRM_TYPE_ID',1)->get()->row()->HRM_ID;
		$last_adv_reg=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$last_adv_id)->get()->row()->HRM_REG_NO;

		$last_registration_no=(int)substr($last_adv_reg, -6);
		$new_registration_no=(string)$last_registration_no+1;

		$new_reg_no=(string)generate_reg("","",6,$new_registration_no);
		$rank=(string)generate_reg("","",2,$_POST['rank']);
		
		$agent_code=strtoupper(substr($_POST['fname'], 0,1)).strtoupper(substr($_POST['lname'], 0,1));
		$registration_no=$agent_code.$rank.$new_reg_no;

		$details=array
			(
				'HRM_TYPE_ID'=>1,
				'RANK_ID'=>$_POST['rank'],
				'HRM_TITLE'=>strtoupper($_POST['title']),
				'HRM_FIRST_NAME'=>strtoupper($_POST['fname']),
				'HRM_MIDDLE_NAME'=>strtoupper($_POST['mname']),
				'HRM_LAST_NAME'=>strtoupper($_POST['lname']),
				'HRM_ADDRESS'=>$_POST['address'],
				'HRM_CITY'=>$_POST['city'],
				'HRM_STATE'=>$_POST['city'],
				'HRM_COUNTRY'=>$_POST['city'],
				'HRM_SEX'=>$_POST['sex'],
				'HRM_NATIONALITY'=>$_POST['nation'],
				'HRM_CONTACT'=>$_POST['cont'],
				'HRM_ALT_CONTACT'=>$_POST['alt_cont'],
				'HRM_EMAIL'=>$_POST['email'],
				'HRM_PAN'=>$_POST['pan'],
				'HRM_ADHAAR'=>$_POST['aadhar'],
				'HRM_GST'=>$_POST['gst'],
				'HRM_USERNAME'=>$_POST['user'],
				'HRM_PASSWORD'=>$_POST['pass'],
				'HRM_STATUS'=>1,
				'BRANCH_ID'=>$_POST['branch'],
				'HRM_PROFESSION_ID'=>$_POST['profession'],
				//'HRM_CREDIT_LIMIT'=>$data['credit_lim'],
				//'HRM_ACCOUNT_TYPE'=>$data['ac_type'],
				'HRM_REG_DATE'=>$_POST['reg_date'],
				'HRM_REG_NO'=>$registration_no,
				'PLAN_EMI_ID'=>0
			);

			$this->db->insert('hrm',$details);

			$hrm_last_id=$this->db->insert_id();

			$added_by=$_POST['sponser'];

			if ($_POST['sponser']=="") 
			{
				$added_by=4;
			}

			$relation=array
						(
							'NEW_HRM_ID'=>$hrm_last_id,
							'HRM_PARENT_ID'=>$added_by,
							'HRM_ADDED_BY'=>$added_by
						);

			$this->db->insert('hrm_relation',$relation);
			
			$account_ledger=array
						(
							'NAME'=>"advisor_".$hrm_last_id,
							'UNDER'=>'28',
							'VISIBLE'=>'1',
							'AMOUNT'=>'0'
						);
			$this->db->insert('accounting_ledgers',$account_ledger);
			$message="Welcome ".ucwords($_POST['fname'])." you are successfully registered as a advisor of Emperial Height";
			send_message($_POST['cont'],$message);
		echo 'err';
	}
	public function register_customer()
	{
		$last_cust_id=$this->db->select_max('HRM_ID')->from('hrm')->where('HRM_TYPE_ID',4)->get()->row()->HRM_ID;
		if($last_cust_id!=''){
			$last_cust_reg=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$last_cust_id)->get()->row()->HRM_REG_NO;
			$last_reg_no=(int)substr($last_cust_reg,-6);
			$new_reg_no=(string)$last_reg_no+1;
		}else{
			$new_reg_no=1;
		}
		$new_registration_no="EMPGHT"."00".(string)generate_reg("","",6,$new_reg_no);


		$emi=$this->db->select('*')->from('plan_emi')->where('PLAN_ID',$_POST['plan_name'])
															 ->where('PLAN_EMI_AMOUNT',$_POST['plan_amount'])
															 ->where('PLAN_EMI_PERIOD',$_POST['plan_duration'])
															 ->get()->row()->PLAN_EMI_ID;

		
		$cust_details=array
			(
				'HRM_TYPE_ID'=>4,
				'RANK_ID'=>0,
				'HRM_TITLE'=>strtoupper($_POST['title']),
				'HRM_FIRST_NAME'=>strtoupper($_POST['fname']),
				'HRM_MIDDLE_NAME'=>strtoupper($_POST['mname']),
				'HRM_LAST_NAME'=>strtoupper($_POST['lname']),
				'HRM_ADDRESS'=>$_POST['address'],
				'HRM_CITY'=>$_POST['city'],
				'HRM_STATE'=>$_POST['city'],
				'HRM_COUNTRY'=>$_POST['city'],
				'HRM_SEX'=>$_POST['sex'],
				'HRM_NATIONALITY'=>$_POST['nation'],
				'HRM_CONTACT'=>$_POST['cont'],
				'HRM_ALT_CONTACT'=>$_POST['alt_cont'],
				'HRM_EMAIL'=>$_POST['email'],
				'HRM_PAN'=>$_POST['pan'],
				'HRM_ADHAAR'=>$_POST['aadhar'],
				'HRM_GST'=>$_POST['gst'],
				'HRM_STATUS'=>1,
				'BRANCH_ID'=>$_POST['branch'],
				'HRM_PROFESSION_ID'=>$_POST['profession'],
				'HRM_CREDIT_LIMIT'=>$_POST['credit_lim'],
				'HRM_ACCOUNT_TYPE'=>$_POST['ac_type'],
				'HRM_REG_DATE'=>$_POST['reg_date'],
				'HRM_REG_NO'=>$new_registration_no,
				'PLAN_EMI_ID'=>$emi
			);
		$this->db->trans_start();

		$this->db->insert('hrm',$cust_details);
		$cust_id=$this->db->insert_id();

		$nominee_details=array
						(
							'HRM_ID'=>$cust_id,
							'NOMINEE_TITLE'=>$_POST['nom_title'],	
							'NOMINEE_FIRST_NAME'=>$_POST['nom_fname'],
							'NOMINEE_MIDDLE_NAME'=>$_POST['nom_mname'],
							'NOMINEE_LAST_NAME'=>$_POST['nom_lname'],
							'NOMINEE_AADHAR'=>$_POST['nom_aadhar'],
							'PROFESSION_ID'=>$_POST['nom_profession'],
							'NOMINEE_ADDRESS'=>$_POST['nom_address'],
							'NOMINEE_RELATION'=>$_POST['nom_relation']
						);

		$this->db->insert('nominee',$nominee_details);

		$date = strtotime($_POST['reg_date']. " +".$_POST['plan_duration']." month");
		$exp_date = date("Y-m-d",$date);

		$plan_details=array
					(
						'PLAN_EMI_ID'=>$emi,
						'PLAN_ACTIVATION_DATE'=>$_POST['reg_date'],
						'PLAN_EXPIRY_DATE'=>$exp_date,
						'PLAN_ACTIVATION_STATUS'=>1,
						'CUSTOMER_ID'=>$cust_id
					);

		$this->db->insert('plan_activation',$plan_details);
		$plan_act_id=$this->db->insert_id();

		$relation_details=array
		(
							'NEW_HRM_ID'=>$cust_id,
							'HRM_PARENT_ID'=>$_POST['add_under'],
							'HRM_ADDED_BY'=>$_POST['added_by']
		);

		$this->db->insert('hrm_relation',$relation_details);
		$receipt=$this->db->select_max('RECEIPT_NO')->from('wallet_balance')->get()->row()->RECEIPT_NO;
		$receipt=$receipt+1;
		$wallet_details=array
						(
							'RECEIPT_NO'=>$receipt,
							'WALLET_AMOUNT'=>(-1)*$_POST['plan_amount'],
							'WALLET_TRANSACTION_METHOD'=>"PLAN PURCHASE",
							'HRM_ID'=>$cust_id,
							'PLAN_ACTIVATION_ID'=>$plan_act_id,
							'WALLET_REMARK'=>"Purchase a plan of ".$_POST['plan_amount']." Rupees",
						);
		$this->db->insert('wallet_balance',$wallet_details);

		$this->db->trans_complete();
		$account_ledger=array
						(
							'NAME'=>"customer_".$cust_id,
							'UNDER'=>'29',
							'VISIBLE'=>'1',
							'AMOUNT'=>(-1)*$_POST['plan_amount']
						);
		$this->db->insert('accounting_ledgers',$account_ledger);
		$drid=$this->db->insert_id();
		$crid=8;
		$br_id=$_POST['branch'];
		$plan_name=get_plan_dt($plan_act_id);
		$plan_name=$plan_name[0]->PLAN_NAME;
		$particular="being plan sold to ".strtoupper($_POST['fname'])." ".strtoupper($_POST['mname'])." ".strtoupper($_POST['lname'])." for rs.".$_POST['plan_amount']." for ".$plan_name;
		$get_plan_amount=get_ledger_dt_by_id(8);
		$get_plan_amount=$get_plan_amount[0]->AMOUNT;
		$amt=$get_plan_amount+$_POST['plan_amount'];
		update_amount_ledger(8,$amt);	
		$comp_id=1;
		insert_record_transaction($drid,$crid,$br_id,$_POST['added_by'],$particular,$_POST['plan_amount'],$_POST['reg_date'],$comp_id);
		$message="Welcome ".ucwords($_POST['fname'])." you are successfully registered as a customer of Emperial Height";
		send_message($_POST['cont'],$message);
		
		echo "err";
	}
	
	public function get_below_ranks()
	{
		$id=$_POST['data'];
		if($id == "")
		{
			$data=$this->db->select("*")->from('rank')->where('RANK_ID >',4)->get()->result();
		}
		else
		{
			$rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$id)->get()->row()->RANK_ID;
			$data=$this->db->select("*")->from('rank')->where('RANK_ID >',$rank_id)->get()->result();
		}
		
		echo json_encode($data);
		
	}
	public function customer_details_model_pay()
	{
		$_SESSION['current_cust_id']=$_POST['reg'];
		$id=$_POST['reg'];
		$data=$this->db->select('*,SUM(WALLET_AMOUNT) as sum')->from('hrm')
								    ->where('hrm.HRM_ID',$id)
								    ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								    ->group_by('wallet_balance.HRM_ID')
								    ->get()->row();

		echo json_encode($data);

	}
	public function report_dashboard()
	{
		$this->load->library('Datatables');

		$plan= empty($_POST['data']) ? false : $_POST['data'];
		$advisor= empty($_POST['adv']) ? false : $_POST['adv'];
		$start_date = empty($_POST['start_date']) ? false : $_POST['start_date'];
		$end_date = empty($_POST['end_date']) ? false : $_POST['end_date'];
		
			$this->datatables->select('*,CONCAT(HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name',FALSE)->from('hrm')
									  ->join('plan_activation','plan_activation.CUSTOMER_ID=hrm.HRM_ID')
									  ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
									  ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')					
									  ->where('hrm.HRM_TYPE_ID',4);
									  if(!empty($plan)){
									  	$this->datatables->where('plan.PLAN_ID',$plan);
									  }
									  if(!empty($advisor)){
									  	$this->datatables->join('hrm_relation','hrm_relation.NEW_HRM_ID=hrm.HRM_ID')
									  	->where('hrm_relation.HRM_ADDED_BY',$advisor);
									  }
									   if(!empty($start_date) && !empty($end_date)){
									  
									  	$this->datatables->where("DATE(HRM_REG_DATE)","BETWEEN {$start_date} AND {$end_date}");
									  }
									  // echo $this->datatables->last_query();exit;
		echo $this->datatables->generate();
	}
	public function add_plan()
	{
		$plan=$_POST['plan'];
		$amount=$_POST['amount'];
		$type=$_POST['type'];

		$period=$this->db->select('PLAN_EMI_PERIOD')->from('plan_emi')->where('PLAN_ID',$plan)->get()->row()->PLAN_EMI_PERIOD;
		$avl=$this->db->select('*')->from('plan_emi')->where('PLAN_EMI_PERIOD',$period)->where('PLAN_EMI_AMOUNT',$amount)->where('PLAN_ID',$plan)->get()->row();
		if($avl == "")
		{
			$plan=array
			(
				'PLAN_ID'=>$plan,
				'PLAN_EMI_AMOUNT'=>$amount,
				'PLAN_EMI_PERIOD'=>$period,
				'PLAN_BONUS_ID'=>1
			);

			$this->db->insert('plan_emi',$plan);
			echo "Plan Added successfully";
		}
		else
		{
			echo "Plan Already Available";
		}
	}
}
