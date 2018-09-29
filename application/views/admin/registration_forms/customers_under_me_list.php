
<!-- Main Content -->
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Advisor List</h6>
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
													<th>Rank</th>
													<th>Name</th>													
													<th>Customers</th>
													<th>Commission</th>	
													<th>Contact</th>
													<th>Tools</th>																
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
				"ajax":{"url":"<?php echo base_url('extra/Get_list/get_all_advisor'); ?>"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"name"},
							{"data":"HRM_CONTACT"},
							{"data":"HRM_ADDRESS"},
							{"data":"PLAN_EMI_ID"},
							{"data":"HRM_CONTACT"},
							{"data":"HRM_ID",render:function(data,type,row)
								{	
									return "<button type='button' onclick='view_customers("+data+")' class='btn btn-sm btn-info'>View details</button>";					
								}
							}
												
						]
					});

			function view_customers(data)
			{
				window.location='<?php echo base_url("admin/customers_under/"); ?>'+data;
			}
		</script>