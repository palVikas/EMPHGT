<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_details extends CI_Controller 
{
	public function customer_details()
	{
		$_SESSION['current_cust_id']=$_POST['reg'];
		$id=$_POST['reg'];
		$data=$this->db->select('*,SUM(WALLET_AMOUNT) as sum')->from('hrm')
								    ->where('hrm.HRM_ID',$id)
								    ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								    ->group_by('wallet_balance.HRM_ID')
								    ->get()->row();

		echo json_encode($data);

	}

	public function get_below_ranks()
	{
		$id=$_POST['data'];
		if($id == "")
		{
			$data=$this->db->select("*")->from('rank')->where('RANK_ID >',4)->get()->result();
		}
		else
		{
			$rank_id=$this->db->select('RANK_ID')->from('hrm')->where('HRM_ID',$id)->get()->row()->RANK_ID;
			$data=$this->db->select("*")->from('rank')->where('RANK_ID >',$rank_id)->get()->result();
		}
		
		echo json_encode($data);
		
	}
}