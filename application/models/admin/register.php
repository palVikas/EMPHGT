<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		if($this->session->userdata['agro_p_signed_in']==''){
			redirect('login/index');
		}
		$this->load->helper('gernal_helper');
	}
	
	

	

	public function generate_reg($prefix,$rank,$length,$num)
	{
		$num_length=strlen($num);
	 	$required_length=$length-$num_length;
	 	$z="";
	 	for ($i=0; $i <$required_length ; $i++) 
	 	{ 
	 		$z=$z."0";
	 	}
	 	return $prefix.$rank.$z.$num;
	}
}