		<!-- jQuery -->
		<script src="<?php echo base_url('include/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

		<!--Datatables-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<!-- Main Content -->
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Customers List</h6>
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
													<th>Registration No</th>
													<th>Name</th>
													<th>Contact</th>													
													<th>Address</th>	
													<th>Plan</th>
													<th>Amount</th>									
													<th>Duration(Month)</th>
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

		<script type="text/javascript">
				var table=$('#tbl').dataTable(
				{
				"ajax":{"url":"<?php echo base_url('extra/Get_list/get_customers_under_me/').$advisor_id ;?>"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"name"},
							{"data":"HRM_CONTACT"},
							{"data":"HRM_ADDRESS"},	
							{"data":"PLAN_NAME"},
							{"data":"PLAN_EMI_AMOUNT"},
							{"data":"PLAN_EMI_PERIOD"}											
						]
					});

			function view_customers(data)
			{
				window.location='<?php echo base_url("admin/customers_under/"); ?>'+data;
			}
		</script>