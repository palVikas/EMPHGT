<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{
	public function report()
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
}