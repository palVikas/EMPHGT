<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_controller
{
	public function check_advisor_type()
	{
		$id=$_POST['data'];
		$data=$this->db->select('*')->from('rank')->where('RANK_STATUS',1)->get();
		echo json_encode($data);
	}

	public function get_plans()
	{
		$id=$_POST['data'];
		$data=$this->db->select("*")->from('plan')->where('PLAN_TYPE_ID',$id)->get()->result();
		echo json_encode($data);
	}

	public function get_amount()
	{
		$id=$_POST['data'];
		//$type=$_POST['type'];
		$data=$this->db->select('*')->from('plan_emi')->where('PLAN_ID',$id)->group_by('PLAN_EMI_AMOUNT')->get()->result();
		echo json_encode($data);
	}
	public function get_duration()
	{
		$amt=$_POST['data'];
		$id=$_POST['id'];
		$data=$this->db->select('*')->from('plan_emi')->where('PLAN_EMI_AMOUNT',$amt)->where('PLAN_ID',$id)->get()->result();
		echo json_encode($data);
	}
	public function check_under()
	{
		$id=$_POST['data'];
		$hrm_rank=$this->db->select('*')->from('hrm')->where('HRM_ID',$id)->get()->row();
		$rank=$hrm_rank->RANK_ID;
		$data=$this->db->select('*')->from('hrm')
									//->join('hrm','hrm.HRM_ID=hrm_relation.HRM_PARENT_ID')	
									->where('RANK_ID <',$rank)->get()->result();
		echo json_encode($data);
	}

	public function get_type()
	{
		$id=$_POST['data'];
		if($id==2)
		{
			$query=$this->db->select('*')->from("rank")->where('RANK_STATUS',1)->get()->result();
			echo json_encode($query);
		}
		elseif($id==1)
		{
			$query=$this->db->select('*')->from("rank")->where('RANK_STATUS',0)->get()->result();
			$query1=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',2)->get()->result();
			echo json_encode(array($query,$query1));
		}
	}

	public function get_super()
	{
		$data=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',2)->get()->result();
		echo json_encode($data);
	}

	public function get_under()
	{
		$data=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',1)->get()->result();
		echo json_encode($data);
	}
}