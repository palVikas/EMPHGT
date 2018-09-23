<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$_SESSION['admin']="dashboard";
		$this->load->view('admin/admin_dashboard');
	}
	public function dashboard()
	{
		$this->load->view('admin/registration_forms/dashboard');
	}
	public function add_company()
	{
		$_SESSION['admin']='company';
		$data=$this->load->view('admin/registration_forms/add_company');
		echo json_encode($data);
	}
	public function add_branch()
	{
		$_SESSION['admin']='branch';
		$data=$this->load->view('admin/registration_forms/add_branch');
		echo json_encode($data);
	}
	public function add_customer()
	{
		$_SESSION['admin']='customer';
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
		echo json_encode($data);
	}
	public function register_advisor()
	{
		$this->load->model('admin/register_advisor');
		$this->register_advisor->check_type();
	}
	public function plan_type()
	{

	}
	public function profession()
	{

	}
	public function cust_list()
	{
		
		$this->load->view('admin/registration_forms/customers_list');
		//$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',4)->get()->result();
	}

	public function customers_list()
	{
		$this->load->library('Datatables');

		$this->datatables->select('*,SUM(WALLET_AMOUNT) as sum')->from('hrm')
									  ->join('wallet_balance','wallet_balance.HRM_ID=hrm.HRM_ID')
								   	  ->group_by('wallet_balance.HRM_ID')						
									  ->where('hrm.HRM_TYPE_ID',4);

		echo $this->datatables->generate();

	}
	public function super_adviser()
	{
		//$_SESSION['admin']='super_advisor';
		$this->load->view('admin/registration_forms/add_hrm');
		//echo json_encode($data);

	}
	public function register_hrm()
	{
		$this->load->model('admin/register');
		$data=$this->register->register_hrm($this->input->post());
		echo $data;
	}

	public function register_customer()
	{
		$this->load->model('admin/register');
		$data=$this->register->register_customer();
		if($data=="successfully registered") 
		{
			echo "<script>alert($data);</script>";	
			//$this->activate_view();
			$this->load->view('admin/registration_forms/add_hrm');
		}
		else
		{
			echo "<script>alert($data);</script>";	
		}
		
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

	public function activate_view()
	{

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
	
}
