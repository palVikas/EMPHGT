<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_list extends CI_model
{
	public function get_customers_under_advisor($id)
	{
		$this->load->library('Datatables');

		$this->datatables->select('*,CONCAT(hrm.HRM_TITLE," ",hrm.HRM_FIRST_NAME," ",hrm.HRM_MIDDLE_NAME," ",hrm.HRM_LAST_NAME) as name')
									  ->from('hrm_relation')
									  ->join('hrm','hrm.HRM_ID=hrm_relation.NEW_HRM_ID')
									  ->where('hrm_relation.HRM_ADDED_BY',$id);

		return $this->datatables->generate();
	}
}