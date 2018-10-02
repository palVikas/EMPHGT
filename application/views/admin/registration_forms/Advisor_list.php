
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
													<th>Commission Amount</th>	
													<th>Contact</th>
													<th>Tools</th>																
												</tr>
											</thead>
											<tbody>	
												<?php foreach($get_list_advisor as $list_advisor) { 
														
															
															$hrm_id=$list_advisor->HRM_ID;
															$total_calc=0;
															$count_cust=0;
															$count = $this->db->query("select * from hrm_relation where HRM_ADDED_BY=$hrm_id");
															$all_hrm_rel= $count->result();
															foreach($all_hrm_rel as $relation_cust){
																$HRM_ID=$relation_cust->NEW_HRM_ID;
																$hrm_type = $this->db->query("select * from hrm where HRM_ID=$HRM_ID");
																$hrm_type=$hrm_type->result();
																//print_r($hrm_type);
																if($hrm_type[0]->HRM_TYPE_ID==4){
																	$count_cust++;
																}
															
															}
															
															$wallet = $this->db->query("select * from wallet_balance where HRM_ID=$hrm_id");
															$wallet=$wallet->result();
														
															foreach($wallet as $amount){
																$total_calc+=$amount->WALLET_AMOUNT;
															}
												
												?>
													<tr>
														<td><?php echo $list_advisor->HRM_REG_NO; ?></td>
														<td><?php echo $list_advisor->RANK_NAME; ?></td>
														<td><?php echo $list_advisor->HRM_FIRST_NAME; ?></td>
														<td><?php echo $count_cust; ?></td>
														<td><?php echo $total_calc; ?></td>
														<td><?php echo $list_advisor->HRM_CONTACT; ?></td>
														<td><a href="<?php echo base_url(); ?>admin/advisor_list/view/<?php echo $list_advisor->HRM_ID; ?>" ><i class="fa fa-eye"></i></a></td>
													</tr>
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
