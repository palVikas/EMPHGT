<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->helper('gernal_helper');
	}
	
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	
}