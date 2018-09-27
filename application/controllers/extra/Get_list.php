<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_list extends CI_Controller 
{
	public function get_all_advisor()
	{
		$this->load->library('Datatables');

		$this->datatables->select('*,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')
									->from('hrm')
									->join('rank','rank.RANK_ID=hrm.RANK_ID')				
									->where('hrm.HRM_TYPE_ID',1);

		echo $this->datatables->generate();
	}
}
