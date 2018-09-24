<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill_invoice extends CI_Controller 
{
	public function invoice_view()
	{
		$data=$_POST['data'];
		$this->load->model('getting_invoice_details');
		$this->getting_invoice_details->get_details($data);
		$this->load->view('header');
		$this->load->view('invoice_details' , $data);
		$this->load->view('footer');
	}
}
	