<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{
	public function report()
	{
		$this->load->library('Datatables');
		$advisor;
		$type=$_POST['type'];
		$plan=$_POST['data'];
		$advisor=$_POST['adv'];

		if ($type == 1) 
		{
			$this->datatables->select('*')->from('hrm')
									   ->join('plan_activation','plan_activation.CUSTOMER_ID=hrm.HRM_ID')
									   ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
									   ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')	
									  //->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  //->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4)
									  ->where('plan.PLAN_ID',$plan);
		}

		elseif ($type == 2) 
		{
			$this->datatables->select('*')->from('hrm')
									   ->join('plan_activation','plan_activation.CUSTOMER_ID=hrm.HRM_ID')
									   ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
									   ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')	
									  //->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  //->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4)
									  ->where('plan.PLAN_ID',$plan);
		}

		elseif ($type == 3) 
		{
			
		}

		

		

		//echo $this->datatables->generate();
	}
}