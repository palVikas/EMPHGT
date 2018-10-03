 <?php
  function get_money_in_words($number)
  {
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return $result;
  }
	function get_ledger_name($ledgerid){
	
		 $CI =& get_instance();
		$CI->load->database();
		$ledger_dt=$CI->db->query('select * from accounting_ledgers where NAME="'.$ledgerid.'"');
		$ledger_dt=$ledger_dt->result();
		return $ledger_dt;
	}
	function get_ledger_dt_by_id($ledgerid){
	
		 $CI =& get_instance();
		$CI->load->database();
		$ledger_dt=$CI->db->query('select * from accounting_ledgers where ID="'.$ledgerid.'"');
		$ledger_dt=$ledger_dt->result();
		return $ledger_dt;
	}
	function update_amount_ledger($ledgerid,$amt){
		 $CI =& get_instance();
		$CI->load->database();
		$ledger_get_amount=$CI->db->query('update accounting_ledgers set AMOUNT="'.$amt.'" where ID="'.$ledgerid.'"');
		return true;
	}
	
	function insert_record_transaction($drid,$crid,$br_id,$particular,$amt,$dt,$comp_id){
		 $CI =& get_instance();
		$CI->load->database();
		$details=array
		(
				 	'DR_ID'=>$drid,
				 	'CR_ID'=>$crid,
				 	'BRANCH_ID'=>$br_id,
				 	'PARTICULAR'=>$particular,
				 	'AMOUNT'=>$amt,
				 	'DATE'=>$dt,
					'COMPANY_ID'=>$comp_id
		);
		$CI->db->insert('accounts',$details);
		return true;
	}
	function get_hrm_full($hrm_id){
		 $CI =& get_instance();
		$CI->load->database();
		$hrm_dt=$CI->db->query("select * from hrm where HRM_ID='".$hrm_id."'");
		$hrm_dt=$hrm_dt->result();
		
		return $hrm_dt;
	}
	function get_plan_dt($plan_activation_id){
		 $CI =& get_instance();
		$CI->load->database();
		$sql="SELECT plan.PLAN_NAME FROM plan_activation LEFT Join plan_emi ON plan_activation.PLAN_EMI_ID=plan_emi.PLAN_EMI_ID LEFT JOIN plan ON plan_emi.PLAN_ID=plan.PLAN_ID where plan_activation.PLAN_ACTIVATION_ID='".$plan_activation_id."'";
		$plan_dt=$CI->db->query($sql);
		$plan_dt=$plan_dt->result();
		return $plan_dt;
	}
	function generate_reg($prefix,$rank,$length,$num)
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