<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_list extends CI_Controller 
{
	public function get_all_advisor()
	{
		$this->load->library('Datatables');
		$this->datatables->select('*,COUNT(NEW_HRM_ID) as customers,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')
									->from('hrm_relation')
									->join('hrm','hrm_relation.HRM_ADDED_BY=hrm.HRM_ID')
									->join('rank','rank.RANK_ID=hrm.RANK_ID')	
									->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID','right')		
									->where('hrm.HRM_TYPE_ID',1)
									->group_by('hrm.HRM_ID');

		echo $this->datatables->generate();
	}

	public function get_customers_under_me()
	{
		$advisor_id=$this->uri->segment(4);
		$this->load->library('Datatables');
		$this->datatables->select('*,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')
										->from('hrm_relation')
									  	->join('hrm','hrm.HRM_ID=hrm_relation.NEW_HRM_ID')
									  	->join('plan_emi','plan_emi.PLAN_EMI_ID=hrm.PLAN_EMI_ID')
									  	->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')
									  	->where('hrm_relation.HRM_ADDED_BY',$advisor_id)
									  	->where('hrm.HRM_TYPE_ID',4);

		echo $this->datatables->generate();
	}
}
