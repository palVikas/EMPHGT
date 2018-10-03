<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getting_invoice_details extends CI_Model 
{
	public function get_details($id)
	{
		$data=$this->db->select('*')->from('hrm')->where('HRM_ID',$id)
											->join('plan_emi','plan_emi.PLAN_EMI_ID=hrm.PLAN_EMI_ID')
											->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')
											->join('hrm_relation','hrm_relation.NEW_HRM_ID=hrm.HRM_ID')
											->join('plan_activation','plan_activation.PLAN_EMI_ID=plan_emi.PLAN_EMI_ID')
											->join('profession','profession.PROFESSION_ID=hrm.HRM_PROFESSION_ID')
											->join('branch','branch.BRANCH_ID=hrm.BRANCH_ID')										
											->get()->row();

		return $data;
	}

	public function create_datatable($id)
	{
		$this->load->library('Datatables');

		$this->datatables->select('*,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')
									->from('hrm')
									->join('rank','rank.RANK_ID=hrm.RANK_ID')				
									->where('hrm.HRM_TYPE_ID',1);

		return $this->datatables->generate();
	}

	
}
