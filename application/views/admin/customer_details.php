<?php
print_r($view_customer_details);

?>
<!-- Main Content -->
<div id="main_content">
	<div class="page-wrapper">
		<div class="container-fluid">
			

			<div class="row">
				<div class="col-md-6 form-group">
					<h4>CUSTOMER DETAILS</h4>
					<hr class="light-gray-hr">
				</div>				
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Invoice List</h6>
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
												<?php if(!empty($view_customer_details)) { foreach($view_customer_details as $key=>$view_cust_dt) { ?> 
													<td><?php echo $view_cust_dt['WALLET_ID']; ?> </td>
													<td><?php echo $view_cust_dt['PLAN_ACTIVATION_ID']; ?> </td>
													<td><?php echo $view_cust_dt['plan_name']; ?> </td>
													<td><?php echo $view_cust_dt['WALLET_AMOUNT']; ?> </td>
													<td><?php echo $view_cust_dt['plan_emi_period']; ?> </td>	
													<td><?php echo $view_cust_dt['WALLET_TRANSACTION_TIME']; ?> </td>
													<td><?php echo $view_cust_dt['first']." ".$view_cust_dt['middle']." ".$view_cust_dt['last']." "; ?> </td>	
													<td><button onclick='print_this("<?php echo $view_cust_dt['WALLET_ID']; ?>")' type='button' class='btn btn-sm btn-info'>Print</button></td>	
												<?php } } ?>
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
</div>
	<script type="text/javascript">
		/*var table=$('#tbl').dataTable(
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
							{"data":"WALLET_ID",render:function(data,type,row)
								{	
									//return '<button type="button" onclick="pay('+data+')" class="btn btn-info btn-sm">Pay</button>';
									return "<button onclick='print_this("+data+")' type='button' class='btn btn-sm btn-info'>Print</button>"
								}
							}
							
							
							
						]
					});
*/
		function print_this(data)
		{
			window.location='<?php echo base_url("admin/print_invoice/")?>'+data;
		}
	</script>
