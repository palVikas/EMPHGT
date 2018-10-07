</br>
</br>
<!-- Main Content -->
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-6">
									<h6 class="panel-title txt-dark">Branch List</h6>
								</div>
								<div class="col-md-6 text-right">
									<a href="<?php echo base_url(); ?>admin/branch/add" class="btn btn-success">Add Branch</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr class="light-grey-hr"/>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="branchlist" class="table table-hover display  pb-30" >
											<thead>
												<tr>
													<th>Registration No</th>
													<th>Branch Name</th>
													<th>Branch Contact</th>													
													<th>Created</th>
													<th>Action</th>														
												</tr>
											</thead>
											<tbody>	
												<?php if(!empty($all_branch)) { foreach($all_branch as $branches) { ?>
												<tr>
													<td><?php echo $branches->BRANCH_REG_NO; ?></td>
													<td><?php echo $branches->BRANCH_NAME; ?></td>
													<td><?php echo $branches->BRANCH_CONTACT; ?></td>
													<td><?php echo $branches->BRANCH_REG_DATE; ?></td>
													<td><a href="<?php echo base_url(); ?>admin/branch/view/<?php echo $branches->BRANCH_ID; ?>" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
														<a href="<?php echo base_url(); ?>admin/branch/edit/<?php echo $branches->BRANCH_ID; ?>" ><i class="fa fa-edit"></i></a>
														
													</td>
												</tr>
												<?php } } ?>
											</tbody>
											<tfoot>
												<tr>
													<th>Registration No</th>
													<th>Branch Name</th>
													<th>Branch Contact</th>													
													<th>Created</th>
													<th>Action</th>														
												</tr>
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
