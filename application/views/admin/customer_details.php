<?php
	// $_SESSION['current_customer']=$data->HRM_ID;
	// $cust_reg_no=$data->HRM_REG_NO;
	// $cust_name=$data->HRM_TITLE." ".$data->HRM_FIRST_NAME." ".$data->HRM_MIDDLE_NAME." ".$data->HRM_LAST_NAME;
	// $cust_address=$data->HRM_ADDRESS;
	// $cust_profession=$data->PROFESSION_NAME;
	// $cust_contact=$data->HRM_CONTACT;
	// $cust_email=$data->HRM_EMAIL;
	// $cust_pan=$data->HRM_PAN;
	// $cust_aadhar=$data->HRM_ADHAAR;
	// $plan_name=$data->PLAN_NAME;
	// $plan_amount=$data->PLAN_EMI_AMOUNT;
	// $plan_duration=$data->PLAN_EMI_PERIOD;
	// $plan_start_date=$data->PLAN_ACTIVATION_DATE;
	// $plan_end_date=$data->PLAN_EXPIRY_DATE;
	// $agent_id=$data->HRM_ADDED_BY;
	// $added_by=$this->db->select('*')->from('hrm')->where('HRM_ID',$agent_id)->get()->row();
	// $agent_reg_no=$added_by->HRM_REG_NO;
	// $agent_name=$added_by->HRM_TITLE." ".$added_by->HRM_FIRST_NAME." ".$added_by->HRM_MIDDLE_NAME." ".$added_by->HRM_LAST_NAME;
	// $agent_address=$added_by->HRM_ADDRESS;
	// $agent_contact=$added_by->HRM_CONTACT;
	// $agent_email=$added_by->HRM_EMAIL;
	// $agent_pan=$added_by->HRM_PAN;
	// $agent_aadhar=$added_by->HRM_ADHAAR;

?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!--Datatables-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
		<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>CUSTOMER DETAILS</title>
</head>
<body>
	<br><br>
	<div class="page-wrapper">
		<div class="container-fluid">
			<!--<div class="row">
				<div class="col-md-6 form-group">
					<h4>PERSONAL DETAILS</h4>
					<hr class="light-gray-hr">
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">REG NO</label>
							<div class="col-md-9">
								<input type="text" class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">NAME</label>
							<div class="col-md-9">
								<input type="text" class="form-control" readonly value="<?php echo $cust_name?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">PROFESSION</label>
							<div class="col-md-9">
								<input type="text" class="form-control" readonly value="<?php echo $cust_profession?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">CONTACT</label>
							<div class="col-md-9">
								<input type="text" class="form-control" readonly value="<?php echo $cust_contact?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">EMAIL</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_email?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">AADHAR</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">PAN NO</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">ADDRESS</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-md-6">
					<h4>PLAN DETAILS</h4>
					<hr class="light-gray-hr">
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">BRANCH NAME</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">PLAN NAME</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">AMOUNT</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">PERIOD</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">START DATE</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 form-group">
							<label class="col-md-3 control-label">END DATE</label>
							<div class="col-md-9">
								<input type="text"  class="form-control" readonly value="<?php echo $cust_reg_no?>">
							</div>
						</div>
					</div>
				</div>
			</div>-->

			<div class="row">
				<div class="col-md-6 form-group">
					<h4>AGENT DETAILS</h4>
					<hr class="light-gray-hr">
				</div>				
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Subscriber List</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr class="light-grey-hr"/>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="tbl" class="table table-hover display  pb-30" >
											<thead>
												<tr>
													<th>INVOICE NO</th>
													<th>PLAN ID</th>
													<th>PLAN NAME</th>
													<th>AMOUNT</th>
													<th>PERIOD(IN MONTHS)</th>	
													<th>TRANSACTION TIME</th>
													<th>AGENT NAME</th>	
													<th>PRINT</th>												
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var table=$('#tbl').dataTable(
				{
				"serverSide": true,
				"ajax":{"url":"<?php echo base_url('admin/get_invoice'); ?>"},
				"columns":
						[
							{"data":"WALLET_ID"},
							{"data":"PLAN_ID"},
							{"data":"PLAN_NAME"},
							{"data":"WALLET_AMOUNT"},
							{"data":"PLAN_EMI_PERIOD"},
							{"data":"WALLET_TRANSACTION_TIME"},
							{"data":"HRM_FIRST_NAME"},
							{"data":"HRM_ID",render:function(data,type,row)
								{	
									//return '<button type="button" onclick="pay('+data+')" class="btn btn-info btn-sm">Pay</button>';
									return "<button onclick='print_this("+data+")' type='button' class='btn btn-sm btn-info'>Print</button>"
								}
							}
							
							
							
						]
					});

		function print_this(data)
		{
			window.location='<?php echo base_url("admin/print_invoice/")?>'+data;
		}
	</script>
</body>
</html>