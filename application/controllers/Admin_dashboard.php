<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{
	public function report()
	{
		$this->load->library('Datatables');

		$plan= empty($_POST['data']) ? false : $_POST['data'];
		$advisor= empty($_POST['adv']) ? false : $_POST['adv'];
		$date = empty($_POST['date']) ? false : $_POST['date'];
		// var_dump($_POST);
		
			$this->datatables->select('*')->from('hrm')
									   ->join('plan_activation','plan_activation.CUSTOMER_ID=hrm.HRM_ID')
									   ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
									   ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')	
									  //->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  //->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4);
									  if(!empty($plan)){
									  	$this->datatables->where('plan.PLAN_ID',$plan);
									  }
									  if(!empty($advisor)){
									  	$this->datatables->join('hrm_relation','hrm_relation.NEW_HRM_ID=hrm.HRM_ID')
									  	->where('hrm_relation.HRM_ADDED_BY',$advisor);
									  }
									   if(!empty($date)){
									  
									  	$this->datatables->where('DATE(HRM_REG_DATE)',$date);
									  }
									  // echo $this->datatables->last_query();exit;
		echo $this->datatables->generate();
	}
}