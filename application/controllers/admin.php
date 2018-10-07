<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->helper('gernal_helper');
		if($this->session->userdata['agro_p_signed_in']==''){
			redirect('login');
		}
	}

	public function dashboard()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');		
	}
	public function branch()
	{
		$data=array();
		$this->load->view('admin/header');
		
		if($this->uri->segment(3)=="add"){
			$this->load->view('admin/branch/add_branch');
		}
		else if($this->uri->segment(3)=="edit"){
			$query=$this->admin_model->get_unique_branch($this->uri->segment(4));
			if(!empty($query)){
				$data['unique_branch']=$query;
			}
			$this->load->view('admin/branch/edit_branch',$data);
		}
		else if($this->uri->segment(3)=="view"){
			$query=$this->admin_model->get_unique_branch($this->uri->segment(4));
			if(!empty($query))
			{
				$data['branch_details']=$query;
			}
			$this->load->view('admin/branch/view_branch',$data);
		}
		else{
			$query=$this->admin_model->get_all_branch();
			if(!empty($query)){
				$data['all_branch']=$query;
			}
			$this->load->view('admin/branch/branch_list',$data);
		}
		$this->load->view('admin/footer');		
	}
	
	public function advisor()
	{
		$data[]=array();
		$this->load->view('admin/header');
		if($this->uri->segment(3)=="view" )
		{
			$query=$this->admin_model->get_unique_cust_hrm($this->uri->segment(4));
			if(!empty($query))
			{
				$data['get_unique_customer_fr_advisor']=$query;
			}
			
			$this->load->view('admin/advisor/view_customers',$data);
			
		}

		else if($this->uri->segment(3)=="edit")
		{
			$query=$this->admin_model->get_unique_advisor($this->uri->segment(4));
			if(!empty($query))
			{
				$data['unique_advisor']=$query;
			}
			$this->load->view('admin/advisor/edit_advisor',$data);
		}

		else if($this->uri->segment(3)=="details")
		{
			$query=$this->admin_model->get_advisor_details($this->uri->segment(4));
			if(!empty($query))
			{
				$data['advisor_details']=$query;
			}
			$this->load->view('admin/advisor/advisor_details',$data);
		}

		else if($this->uri->segment(3)=="add_advisor")
		{
			$this->load->view('admin/advisor/add_advisor');	
		}

		else
		{
			$query=$this->admin_model->get_all_advisor();
			if(!empty($query)){
				$data['get_list_advisor']=$query;
			}
			$this->load->view('admin/advisor/advisor_list',$data);
		}

		$this->load->view('admin/footer');
	}
	
	public function customer()
	{
		$data[]=array();
		$this->load->view('admin/header');
		
	
		if($this->uri->segment(3)=="view" ){
			$hrm_id=$this->uri->segment(4);
			$query=$this->admin_model->wallet_details($hrm_id);
			if(!empty($query)){
					$data['view_customer_details']=$query;
			}
			else
			{
				$data['view_customer_details']="";
			}
		
			$this->load->view('admin/customer/view_customer_details',$data);
			
			
		}else if($this->uri->segment(3)=="add_customer"){
			$this->load->view('admin/customer/add_customer');	
		}
		else if($this->uri->segment(3)=="invoice_details_customer"){
			
			$wallet_id=$this->uri->segment(4);
			$data['data']=$this->admin_model->print_invoice($wallet_id);
			$this->load->view('admin/customer/invoice_details_customer',$data);	
		}
		else{
			$this->load->view('admin/customer/customers_list');
		}
		$this->load->view('admin/footer');
	}
	
	
	public function company()
	{
		$this->load->view('admin/header');
		$data=$this->load->view('admin/comapny/add_company');
		$this->load->view('admin/footer');
		
	}
	

	public function activate()
	{
		$this->load->model('activate');
		$this->activate->activate_plan();
	}

	public function customer_details()
	{
		$hrm_id=$this->uri->segment(3);
		$data=$this->db->select('*')->from('hrm')->where('HRM_ID',$hrm_id)
									->join('plan_activation','plan_activation.CUSTOMER_ID=hrm.HRM_ID')
									->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
									->get()->row();

		print_r($data);							
	}

	public function get_invoice()
	{
		$cust_id=$_SESSION['current_cust_id'];
		$this->load->library('Datatables');	

		$this->datatables->select('*')->from('hrm')
		                              ->join('hrm_relation','hrm.HRM_ID=hrm_relation.HRM_ADDED_BY')
		                              ->join('wallet_balance','wallet_balance.HRM_ID=hrm_relation.NEW_HRM_ID')
									  ->join('plan_activation','plan_activation.PLAN_ACTIVATION_ID=wallet_balance.PLAN_ACTIVATION_ID')
								   	  ->join('plan_emi','plan_emi.PLAN_EMI_ID=plan_activation.PLAN_EMI_ID')
								   	  ->join('plan','plan.PLAN_ID=plan_emi.PLAN_ID')
								   	  ->where('wallet_balance.HRM_ID',$cust_id)
								   	  ->where('wallet_balance.WALLET_AMOUNT >',0);

		echo $this->datatables->generate();
	}

	public function customers_under()
	{
		$data['advisor_id']=$this->uri->segment(3);
		//$this->load->model('admin/Get_list');
		//$data=$this->Get_list->get_customers_under_advisor($advisor_id);
		//print_r($data);
		$this->load->view("admin/registration_forms/customers_under_me_list",$data);
	}
	
}
