<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller
{
	public function index()
	{
		session_destroy();
		$this->load->view('login');
	}

	public function login_type()
	{
		$type=$_POST['login_type'];
		$user=$_POST['user_name'];
		$pass=$_POST['password'];
		if ($type==1) 
		{
			$this->branch_login($user,$pass);
		}
		elseif($type==2)
		{
			$this->employee_login($user,$pass);
		}
		elseif($type==3)
		{
			$this->admin_login($user,$pass);
		}
	}

	public function branch_login($user,$pass)
	{
		$query=$this->db->query("select * from branch where BRANCH_USERNAME='".$user."'");
		if ($query->num_rows()==0) 
		{
			echo "<script>alert('no user found');window.location='index'</script>";
		}
		else
		{
			$query=$this->db->query("select * from branch where BRANCH_USERNAME='".$user."' and BRANCH_PASSWORD='".$pass."'");
			if ($query->num_rows()==0) 
			{
				echo "<script>alert('wrong password');window.location='index'</script>";
			}
			else
			{
				$_SESSION['agro_p_signed_in'] = TRUE;
				$_SESSION['user']=$user;
				$_SESSION['branch']=$query->row()->BRANCH_ID;
				echo "<script>alert('Welcome');window.location='../branch/index'</script>";	
			}
		}
	}

	public function employee_login($user,$pass)
	{
		$query=$this->db->query("select * from hrm where USERNAME='".$user."'");
		if (!$query->result()) 
		{
			echo "<script>alert('no user found');window.location='index'</script>";
		}
		else
		{

		}
	}

	public function admin_login($user,$pass)
	{
		$query=$this->db->query("select * from admin where USERNAME='".$user."'");
		if ($query->num_rows()==0) 
		{
			echo "<script>alert('no user found');window.location='index'</script>";
		}
		else
		{
			$query=$this->db->query("select * from admin where USERNAME='".$user."' and PASSWORD='".$pass."'");
			if ($query->num_rows()==0) 
			{
				echo "<script>alert('wrong password');window.location='index'</script>";
			}
			else
			{				
				$_SESSION['user']=$query->row()->HRM_ID;
				$_SESSION['branch']=$query->row()->BRANCH_ID;
				echo "<script>alert('Successfully login');window.location='../admin/index'</script>";	
			}
		}
	}
}