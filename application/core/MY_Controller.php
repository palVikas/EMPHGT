<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('agro_p_signed_in') || empty($this->session->userdata('agro_p_signed_in')))
		{
			return redirect('login');
		}
	}

}