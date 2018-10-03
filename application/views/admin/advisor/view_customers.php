
<!-- Main Content -->
<div id="main_content">
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Customer List</h6>
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
													<th>Full Name</th>
													<th>Contact No.</th>													
													<th>Address</th>
													<th>Plan Name</th>	
													<th>Amount</th>
																												
												</tr>
											</thead>
											<tbody>	
												<?php if(!empty($get_unique_customer_fr_advisor)) { foreach($get_unique_customer_fr_advisor as $key => $customer) {
													
												?><tr>
													<td><?php echo $customer['reg_no']; ?></td>
													<td><?php echo $customer['first']." ".$customer['middle']." ".$customer['last']; ?></td>
													<td><?php echo $customer['contact']; ?></td>													
													<td><?php echo $customer['address']; ?></td>
													<td><?php echo $customer['plan_nm']; ?></td>	
													<td><?php echo $customer['amount']; ?></td>
													</tr>
												<?php  }  }else { ?>
												<tr><th colspan="6" class="text-center">No results found</th></tr>
												<?php } ?>
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
