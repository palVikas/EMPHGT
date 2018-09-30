<?php
class Admin_model extends CI_Model {

    public function get_all_advisor()
	{
		$query = $this->db->query("SELECT hrm.HRM_FIRST_NAME,hrm.HRM_ID,hrm.HRM_REG_NO,hrm.HRM_CONTACT,hrm.RANK_ID,rank.RANK_NAME from hrm LEFT JOIN rank ON rank.RANK_ID = hrm.RANK_ID where hrm.HRM_TYPE_ID='1'");
		$query=$query->result();
		$all_array=array();
		
		//$all_array_data=array_merge($query,$all_array);
		//print_r($all_array_data);
		return $query; 
	}
	 public function get_unique_cust_hrm($id)
	{
		$hrm_added_by = $this->db->query("select * from hrm_relation where HRM_ADDED_BY=$id");
		$hrm_added_by=$hrm_added_by->result();
		$all_array=array();
		foreach($hrm_added_by as $hrm){
			$min=array();
			$hrm_id=$hrm->NEW_HRM_ID;
			
			$query = $this->db->query("select * from hrm where HRM_ID=$hrm_id and HRM_TYPE_ID='4'");
			$query=$query->result();	
			if(!empty($query)){
				$min['reg_no']=$query[0]->HRM_REG_NO;
				$min['first']=$query[0]->HRM_FIRST_NAME;
				$min['middle']=$query[0]->HRM_MIDDLE_NAME;
				$min['last']=$query[0]->HRM_LAST_NAME;
				$min['contact']=$query[0]->HRM_CONTACT;
				$min['address']=$query[0]->HRM_ADDRESS;
				$plan_id=$query[0]->PLAN_EMI_ID;
				$plan_emi = $this->db->query("select * from plan_emi where PLAN_EMI_ID=$plan_id");
				$plan_emi=$plan_emi->result();
				$min['amount']=$plan_emi[0]->PLAN_EMI_AMOUNT;
				$plan_emi_id=$plan_emi[0]->PLAN_ID;
				$plan_nm = $this->db->query("select * from plan where PLAN_ID=$plan_emi_id");
				$plan_nm=$plan_nm->result();
				$min['plan_nm']=$plan_nm[0]->PLAN_NAME;
				array_push($all_array,$min);
			}
		}
		return $all_array;
	}
	
	public function wallet_details($id)
	{
		$query = $this->db->query("select * from wallet_balance where HRM_ID=$id and WALLET_AMOUNT>0 ");
		$query=$query->result();	
		$all_array=array();
		foreach($query as $plan_activation){
			$min=array();
			$hrm_id=$plan_activation->HRM_ID;
			$plan_activation_id=$plan_activation->PLAN_ACTIVATION_ID;
			$plan_activate = $this->db->query("select * from plan_activation where PLAN_ACTIVATION_ID=$plan_activation_id");
			$plan_activate=$plan_activate->result();
			$plan_emi_id=$plan_activate[0]->PLAN_EMI_ID;
			$plan_type_dt = $this->db->query("select * from plan where PLAN_ID=$plan_emi_id");
			$plan_type_dt=$plan_type_dt->result();
			$plan_period_id=$plan_type_dt[0]->PLAN_ID;
			$plan_period_id = $this->db->query("select * from plan_emi where PLAN_ID=$plan_period_id");
			$plan_period_id=$plan_period_id->result();
			$hrm_relation = $this->db->query("select * from hrm_relation where NEW_HRM_ID=$hrm_id");
			$hrm_relation=$hrm_relation->result();
			$hrm_added_by=$hrm_relation[0]->HRM_ADDED_BY;
			$agent_nm = $this->db->query("select * from hrm where HRM_ID=$hrm_added_by");
			$agent_nm=$agent_nm->result();
			$min['WALLET_ID']=$plan_activation->WALLET_ID;
			$min['WALLET_AMOUNT']=$plan_activation->WALLET_AMOUNT;
			$min['WALLET_TRANSACTION_TIME']=$plan_activation->WALLET_TRANSACTION_TIME;
			$min['PLAN_ACTIVATION_ID']=$plan_activation->PLAN_ACTIVATION_ID;
			$min['plan_name']=$plan_type_dt[0]->PLAN_NAME;
			$min['first']=$agent_nm[0]->HRM_FIRST_NAME;
			$min['middle']=$agent_nm[0]->HRM_MIDDLE_NAME;
			$min['last']=$agent_nm[0]->HRM_LAST_NAME;
			$min['plan_emi_period']=$plan_period_id[0]->PLAN_EMI_PERIOD;
			array_push($all_array, $min);
		}
		return $all_array; 
	}

}
?>