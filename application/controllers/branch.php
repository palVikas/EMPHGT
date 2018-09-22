<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_controller
{
	public function index()
	{
		$this->load->view('branch/branch_dashboard');
	}

	public function add_customer()
	{
		$data=$this->load->view('branch/add_customer');
		echo json_encode($data);
	}

	public function add_hrm()
	{
		$data=$this->load->view('branch/add_hrm');
		echo json_encode($data);
	}

	public function register_hrm()
	{
		$data=$this->input->post();
		$this->load->model('branch/register');
		$this->register->register_hrm($data);
	}
}