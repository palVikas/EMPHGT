<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_model
{
	public function register_hrm($data)
	{
		$details=array
			(
				'HRM_TYPE_ID'=>$data['hrm_type'],
				'RANK_ID'=>$data['rank'],
				'HRM_TITLE'=>$data['title'],
				'HRM_FIRST_NAME'=>$data['fname'],
				'HRM_MIDDLE_NAME'=>$data['mname'],
				'HRM_LAST_NAME'=>$data['lname'],
				'HRM_ADDRESS'=>$data['address'],
				'HRM_CITY'=>$data['city'],
				'HRM_STATE'=>$data['city'],
				'HRM_COUNTRY'=>$data['city'],
				'HRM_SEX'=>$data['sex'],
				'HRM_NATIONALITY'=>$data['nation'],
				'HRM_CONTACT'=>$data['cont'],
				'HRM_ALT_CONTACT'=>$data['alt_cont'],
				'HRM_EMAIL'=>$data['email'],
				'HRM_PAN'=>$data['pan'],
				'HRM_ADHAAR'=>$data['aadhar'],
				'HRM_GST'=>$data['gst'],
				'HRM_USERNAME'=>$data['user'],
				'HRM_PASSWORD'=>$data['pass'],
				'HRM_STATUS'=>1,
				'BRANCH_ID'=>$_SESSION['branch']
			);

		$this->db->insert('hrm',$details);
		echo "<script>alert('inserted');window.location='index'</script>";
	}
}