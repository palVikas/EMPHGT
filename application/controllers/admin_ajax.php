<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		if($this->session->userdata['agro_p_signed_in']==''){
			redirect('login/index');
		}
	}

	
	public function cust_list()
	{		
		$this->load->library('Datatables');

		$this->datatables->select('*,SUM(WALLET_AMOUNT) as sum,RECEIPT_NO,CONCAT(HRM_TITLE," ",HRM_FIRST_NAME," ",HRM_MIDDLE_NAME," ",HRM_LAST_NAME) as name')->from('hrm')
									  ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  ->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4);

		echo $this->datatables->generate();
	}

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
}
