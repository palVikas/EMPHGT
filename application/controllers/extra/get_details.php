<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_details extends CI_Controller 
{
	public function customer_details()
	{
		$id=$_POST['reg'];
		$data=$this->db->select('*,SUM(WALLET_AMOUNT) as sum')->from('hrm')
								    ->where('hrm.HRM_ID',$id)
								    ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								    ->group_by('wallet_balance.HRM_ID')
								    ->get()->row();

		echo json_encode($data);

	}
}