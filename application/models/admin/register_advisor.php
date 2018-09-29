<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_advisor extends CI_model
{
	public function check_type()
	{
		$type=$_POST['hrm_type'];
		if ($type==1) 
		{
			$this->advisor($this->input->post());
		}
		else if($type == 2)
		{
			$this->super_advisor($this->input->post());;
		}
	}

	public function advisor($data)
	{
		$last_adv_id=$this->db->select_max('HRM_ID')->from('hrm')->where('HRM_TYPE_ID',1)->get()->row()->HRM_ID;
		$last_adv_reg=$this->db->select('HRM_REG_NO')->from('hrm')->where('HRM_ID',$last_adv_id)->get()->row()->HRM_REG_NO;

		$last_registration_no=(int)substr($last_adv_reg, -6);
		$new_registration_no=(string)$last_registration_no+1;

		$new_reg_no=(string)$this->generate_reg("","",6,$new_registration_no);
		$rank=(string)$this->generate_reg("","",2,$data['rank']);
		
		$agent_code=strtoupper(substr($data['fname'], 0,1)).strtoupper(substr($data['lname'], 0,1));
		$registration_no=$agent_code.$rank.$new_reg_no;

		$details=array
			(
				'HRM_TYPE_ID'=>1,
				'RANK_ID'=>$data['rank'],
				'HRM_TITLE'=>$data['title'],
				'HRM_FIRST_NAME'=>strtoupper($data['fname']),
				'HRM_MIDDLE_NAME'=>strtoupper($data['mname']),
				'HRM_LAST_NAME'=>strtoupper($data['lname']),
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
				'BRANCH_ID'=>$data['branch'],
				'HRM_PROFESSION_ID'=>$data['profession'],
				//'HRM_CREDIT_LIMIT'=>$data['credit_lim'],
				//'HRM_ACCOUNT_TYPE'=>$data['ac_type'],
				'HRM_REG_DATE'=>$data['reg_date'],
				'HRM_REG_NO'=>$registration_no,
				'PLAN_EMI_ID'=>0
			);

			$this->db->insert('hrm',$details);

			$hrm_last_id=$this->db->insert_id();

			$added_by=$data['sponser'];

			if ($data['sponser']=="") 
			{
				$added_by=4;
			}

			$relation=array
						(
							'NEW_HRM_ID'=>$hrm_last_id,
							'HRM_PARENT_ID'=>$added_by,
							'HRM_ADDED_BY'=>$added_by
						);

			$this->db->insert('hrm_relation',$relation);

			echo "<script>alert('inserted');window.location='index';</script>";

	}

	public function super_advisor($data)
	{
		$reg=$this->db->select_max('HRM_REG_NO')->get('hrm')->row();
		$register=$reg->HRM_REG_NO+1;
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
				'BRANCH_ID'=>$data['branch'],
				'HRM_PROFESSION_ID'=>$data['profession'],
				'HRM_CREDIT_LIMIT'=>00000,
				'HRM_ACCOUNT_TYPE'=>0,
				'HRM_REG_DATE'=>$data['reg_date'],
				'HRM_REG_NO'=>$register,
				'PLAN_EMI_ID'=>0
			);

			$this->db->insert('hrm',$details);

			//$reg=$this->db->select_max('HRM_ID')->get('hrm')->row();
			$last_id=$this->db->insert_id();

		//	$register=$reg->HRM_ID;

			$relation=array
						(
							'NEW_HRM_ID'=>$last_id,
							'HRM_PARENT_ID'=>$last_id,
							'HRM_ADDED_BY'=>$last_id
						);

			$this->db->insert('hrm_relation',$relation);

			echo "<script>alert('inserted');window.location='index';</script>";
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