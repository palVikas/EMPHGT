<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_model
{
	public function register_hrm($data)
	{
         
       // print_r($_POST); 
       // return;
		$register=1000000;

		$pid=$_POST['plan_name'];
		$pamt=$_POST['plan_amount'];
		$pduration=$_POST['plan_duration'];

		$plan_emi_id=$this->db->select('*')->from('plan_emi')->where('PLAN_ID',$pid)
															 ->where('PLAN_EMI_AMOUNT',$pamt)
															 ->where('PLAN_EMI_PERIOD',$pduration)->get()->row();
		$emi=$plan_emi_id->PLAN_EMI_ID;

		$reg=$this->db->select_max('HRM_REG_NO')->get('hrm')->row();
		if ($reg) 
		{
			$register=$reg->HRM_REG_NO;
		}
		$reg_no=$register+1;

		$date = strtotime($data['reg_date']. " +".$pduration." month");
		$exp_date = date("Y-m-d",$date);

		
		$details=array
			(
				'HRM_TYPE_ID'=>4,
				'RANK_ID'=>0,
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
				'HRM_CREDIT_LIMIT'=>$data['credit_lim'],
				'HRM_ACCOUNT_TYPE'=>$data['ac_type'],
				'HRM_REG_DATE'=>$data['reg_date'],
				'HRM_REG_NO'=>$reg_no,
				'PLAN_EMI_ID'=>$emi
			);
		$this->db->trans_start();

		$this->db->insert('hrm',$details);

		$hrm_id=$this->db->insert_id();

		$nom_detail=array
					(
						'NOMINEE_TITLE'=>$data['nom_title'],
						'NOMINEE_FIRST_NAME'=>$data['nom_fname'],
						'NOMINEE_MIDDLE_NAME'=>$data['nom_mname'],
						'NOMINEE_LAST_NAME'=>$data['nom_lname'],
						'NOMINEE_AADHAR'=>$data['nom_aadhar'],
						'PROFESSION_ID'=>$data['nom_profession'],
						'NOMINEE_ADDRESS'=>$data['nom_address'],
						'NOMINEE_RELATION'=>$data['nom_relation'],
						'HRM_ID'=>$hrm_id
					);	

		$this->db->insert('nominee',$nom_detail);

		$relation_details=array
						  (
						  		'NEW_HRM_ID'=>$hrm_id,
						  		'HRM_PARENT_ID'=>$data['add_under'],
						  		'HRM_ADDED_BY'=>$data['added_by']
						  );
		$activation_details=array
							(
								'PLAN_EMI_ID'=>$emi,
								'PLAN_ACTIVATION_DATE'=>$data['reg_date'],
								'PLAN_EXPIRY_DATE'=>$exp_date,
								'PLAN_ACTIVATION_STATUS'=>1,
								'CUSTOMER_ID'=>$hrm_id
							);

		$this->db->insert('plan_activation',$activation_details);

		$plan_activation_id=$this->db->insert_id();

		$wallet_details=array
						(
							'WALLET_AMOUNT'=>(-1)*($pamt),
							'WALLET_TRANSACTION_METHOD'=>1,
							'HRM_ID'=>$hrm_id,
							'PLAN_ACTIVATION_ID'=>$plan_activation_id,
							'WALLET_REMARK'=>'Purchase a plan of '.$pamt.' rupees'
						);	


		$this->db->insert('wallet_balance',$wallet_details);		  
		$this->db->insert('hrm_relation',$relation_details);

		
		$this->db->trans_complete();
						
		echo "<script>alert('inserted');window.location='index'</script>";
		
	}

	

	public function register_customer()
	{
		$register=1000000;

		$pid=$_POST['plan_name'];
		$pamt=$_POST['plan_amount'];
		$pduration=$_POST['plan_duration'];

		$plan_emi_id=$this->db->select('*')->from('plan_emi')->where('PLAN_ID',$pid)
															 ->where('PLAN_EMI_AMOUNT',$pamt)
															 ->where('PLAN_EMI_PERIOD',$pduration)->get()->row();
		$emi=$plan_emi_id->PLAN_EMI_ID;

		$reg=$this->db->select_max('CUSTOMER_REG_NO')->get('customers')->row();
		if ($reg) 
		{
			$register=$reg->CUSTOMER_REG_NO;
		}
		$reg_no=$register+1;

		$image_name=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];
		$image_size=$_FILES['image']['size'];
		$image_error=$_FILES['image']['error'];

		$image_ext=explode('.',$image_name);
		$image_extension=strtolower(end($image_ext));
		
		$allowed=array('jpg','jpeg','png','pdf');

		if (in_array($image_extension, $allowed)) 
		{
			if ($image_error==0) 
			{
				if ($image_size < 500000) 
				{
					$new_name=uniqid('',true).".".$image_extension;
					$destination="../../images/customers/".$new_name;
					$done=1;
				}
				else
				{
					$msg="File size is too big";
					return $msg;
				}
			}
			else
			{
				$msg="Error uploading file";
				return $msg;
			}
		}
		else
		{
			$msg="File type not allowed";
			return $msg;
		}

		$details=array
				(
					'HRM_TYPE_ID'=>$_POST['cust_type'],
					'RANK_ID'=>$_POST['cust_rank'],
					'HRM_TITLE'=>$_POST['title'],
					'HRM_REG_NO'=>$_POST['reg_date'],
					'HRM_REG_DATE'=>$_POST['reg_date'],
					'HRM_ACCOUNT_TYPE'=>$_POST['ac_type'],
					'HRM_FIRST_NAME'=>$_POST['fname'],
					'HRM_MIDDLE_NAME'=>$_POST['mname'],
					'HRM_LAST_NAME'=>$_POST['lname'],
					'HRM_PROFESSION_ID'=>$_POST['profession'],
					'HRM_CREDIT_LIMIT'=>$_POST['credit_lim'],
					'HRM_ADDRESS'=>$_POST['address'],
					'HRM_CITY'=>$_POST[''],
					'HRM_STATE'=>$_POST[''],
					'HRM_COUNTRY'=>$_POST[''],
					'HRM_SEX'=>$_POST['sex'],
					'HRM_NATIONALITY'=>$_POST['nation'],
					'HRM_CONTACT'=>$_POST['cont'],
					'HRM_ALT_CONTACT'=>$_POST['alt_cont'],
					'HRM_EMAIL'=>$_POST[''],
					'HRM_PAN'=>$_POST['pan'],
					'HRM_ADHAAR'=>$_POST['aadhar'],
					'HRM_GST'=>$_POST['gst'],
					'HRM_USERNAME'=>$_POST[''],
					'HRM_PASSWORD'=>$_POST[''],
					'HRM_STATUS'=>$_POST[''],
					'BRANCH_ID'=>$_POST['branch']					
				);
		$cust_details=array
					(
						'CUSTOMER_REG_NO'=>$reg_no,
						'CUSTOMER_REG_DATE'=>$_POST['reg_date'],
						'CUSTOMER_TITLE'=>$_POST['title'],
						'CUSTOMER_SEX'=>$_POST['sex'],
						'CUSTOMER_FIRST_NAME'=>$_POST['fname'],
						'CUSTOMER_MIDDLE_NAME'=>$_POST['mname'],
						'CUSTOMER_LAST_NAME'=>$_POST['lname'],
						'CUSTOMER_NATIONALITY'=>$_POST['nation'],
						'CUSTOMER_ACCOUNT_TYPE'=>$_POST['ac_type'],
						'CUSTOMER_PROFESSION_ID'=>$_POST['profession'],
						'CUSTOMER_CREDIT_LIMIT'=>$_POST['credit_lim'],
						'CUSTOMER_ADDRESS'=>$_POST['address'],
						'CUSTOMER_PAN'=>$_POST['pan'],
						'CUSTOMER_ADHAAR'=>$_POST['aadhar'],
						'CUSTOMER_GSTNO'=>$_POST['gst'],
						'CUSTOMER_CONTACT'=>$_POST['cont'],
						'CUSTOMER_ALT_CONTACT'=>$_POST['alt_cont'],
						'CUSTOMER_PHONE'=>$_POST['mobile'],
						'CUSTOMER_IMAGE'=>$destination,
						'PLAN_EMI_ID'=>$emi,
						'HRM_ID'=>$_POST['hrm'],
						'BRANCH_ID'=>$_POST['branch']						
					);

		$nom_details=array
				(
					'NOMINEE_ID'=>$reg_no,
					'NOMINEE_TITLE'=>$_POST['nom_title'],
					'NOMINEE_FIRST_NAME'=>$_POST['nom_fname'],
					'NOMINEE_MIDDLE_NAME'=>$_POST['nom_mname'],
					'NOMINEE_LAST_NAME'=>$_POST['nom_lname'],
					'NOMINEE_AADHAR'=>$_POST['nom_aadhar'],
					'NOMINEE_RELATION'=>$_POST['nom_relation'],
					'PROFESSION_ID'=>$_POST['nom_profession'],
					'NOMINEE_ADDRESS'=>$_POST['nom_address']
				);
		
		if ($done==1) 
		{
			//move_uploaded_file($image_tmp, $destination);
			$this->db->insert('hrm',$details);
			$this->db->insert('nominee',$nom_details);
			$this->db->select_max('')->from('hrm')->get()->row();
			//$this->db->insert('plan_activation',$active_details);
			$msg="successfully registered";
			return $msg;
		}	
	}
}