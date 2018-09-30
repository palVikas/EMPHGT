<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/registration_forms/dashboard');
		$this->load->view('admin/footer');
	}
	public function dashboard()
	{
		$this->load->view('admin/registration_forms/dashboard');
		
	}
	
	public function add_company()
	{
		$data=$this->load->view('admin/registration_forms/add_company');
		echo json_encode($data);
	}
	
	public function add_branch()
	{
		$data=$this->load->view('admin/registration_forms/add_branch');
		
	}
	public function add_customer()
	{
		$data=$this->load->view("admin/registration_forms/customer");
		echo json_encode($data);
	}
	public function relation()
	{
		$data=$this->load->view("admin/registration_forms/relation");
		echo json_encode($data);
	}
	public function add_advisor()
	{
		
		$data=$this->load->view('admin/registration_forms/add_advisor');
		
	}
	
	public function register_advisor()
	{
		$this->load->model('admin/register_advisor');
		$this->register_advisor->advisor($this->input->post());
	}

	public function advisor_list()
	{
		$data[]=array();
		if($this->uri->segment(3)=="view" ){
			$query=$this->admin_model->get_unique_cust_hrm($this->uri->segment(4));
			if(!empty($query)){
				$data['get_unique_customer_fr_advisor']=$query;
			}
			$this->load->view('admin/header');
			$this->load->view('admin/registration_forms/view_customers',$data);
			$this->load->view('admin/footer');
		}
		else{
			$query=$this->admin_model->get_all_advisor();
			if(!empty($query)){
				$data['get_list_advisor']=$query;
			}
			$this->load->view('admin/registration_forms/Advisor_list',$data);
		}
	}
	public function cust_list()
	{		
		$this->load->view('admin/registration_forms/customers_list');
		
	}


	public function super_adviser()
	{
		$this->load->view('admin/registration_forms/add_hrm');
	}

	public function register_customer()
	{
		$this->load->model('admin/register');
		$data=$this->register->register_customer($this->input->post());
	}

	public function register_customer1()
	{
		$this->load->model('admin/register');
		$data=$this->register->register_customer();
		if($data=="successfully registered") 
		{
			echo "<script>alert($data);</script>";	
			$this->load->view('admin/registration_forms/add_hrm');
		}
		else
		{
			echo "<script>alert($data);</script>";	
		}
		
	}

	public function register_branch()
	{
		$this->load->model('admin/register');
		$this->register->register_branch();
	}

	public function create_relation()
	{
		$data=array
				(
					'NEW_HRM_ID'=>$_POST['child'],
					'HRM_PARENT_ID'=>$_POST['parent'],
					'HRM_ADDED_BY'=>$_POST['parent']
				);

		$this->db->insert('hrm_relation',$data);
		echo "<script>alert('inserted');window.location='index';</script>";	
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

	public function view_customer_details()
	{  
		$hrm_id=$this->uri->segment(3);
		$query=$this->admin_model->wallet_details($hrm_id);
		if(!empty($query)){
				$data['view_customer_details']=$query;
		}
		$this->load->view('admin/header');
		$this->load->view('admin/customer_details',$data);
		$this->load->view('admin/footer');
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

	public function print_invoice()
	{
		$wallet_id=$this->uri->segment(3);
		$this->load->model('Getting_invoice_details');
		$data['data']=$this->Getting_invoice_details->print_invoice($wallet_id);
		$this->load->view('invoice_details1',$data);
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
