<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_list extends CI_Controller 
{
	public function get_all_advisor()
	{
		$this->load->library('Datatables');

		$this->datatables->select('*,COUNT(NEW_HRM_ID) from hrm_relation where HRM_ADDED_BY=hrm.HRM_ID,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')
									->from('hrm')
									->join('rank','rank.RANK_ID=hrm.RANK_ID')	
									//->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')	
									//->join('hrm_relation','hrm_relation.HRM_ADDED_BY=hrm.HRM_ID')
									//->where('wallet_balance.HRM_ID','hrm.HRM_ID')		
									->where('hrm.HRM_TYPE_ID',1);

		echo $this->datatables->generate();
	}
}
