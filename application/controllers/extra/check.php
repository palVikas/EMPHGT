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
		$data=$this->db->select("*")->from('plan')->where('PLAN_TYPE_ID',$id)->where('PLAN_STATUS',1)->get()->result();
		echo json_encode($data);
	}

	public function get_amount()
	{
		$id=$_POST['data'];
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

	public function calculate()
	{
		$id=$_POST['plan_id'];
		$amount=(int)$_POST['amount'];
		$duration=(int)$_POST['duration'];
		$type=$_POST['plan_type'];		

		$data=$this->db->select('PLAN_INTEREST_ID,BONUS_TYPE_ID')->from('plan')->where('PLAN_ID',$id)->get()->row();
		$plan_bonus_id=$data->BONUS_TYPE_ID;
		$interest_id=$data->PLAN_INTEREST_ID;

		$interest_rate=$this->db->select('PLAN_INTEREST_RATE')->from('plan_interest')->where('PLAN_INTEREST_ID',$interest_id)->get()->row()->PLAN_INTEREST_RATE;
		$bonus_rate=$this->db->select('BONUS_TYPE_AMOUNT')->from('bonus_type')->where('BONUS_TYPE_ID',$plan_bonus_id)->get()->row()->BONUS_TYPE_AMOUNT;
		
		if ($type == 2) 
		{
			$redemption_value=$amount+(($amount*$interest_rate)/100);
			$bonus_value=($amount*$bonus_rate)/100;
			$total_money=$redemption_value+$bonus_value;
		}
		else
		{
			$money_value=$amount*$duration;
			$redemption_value=$money_value+(($money_value*$interest_rate)/100);
			$bonus_value=($money_value*$bonus_rate)/100;
			$total_money=$redemption_value+$bonus_value;
		}
		
		$data=array($redemption_value,$bonus_value,$total_money);
		echo json_encode($data);
	}
}