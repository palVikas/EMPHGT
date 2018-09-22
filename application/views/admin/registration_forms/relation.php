				<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Staff</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Add hrm</span></li>
							  </ol>
							</div>
							<!-- /Breadcrumb -->
						</div>
						<!-- Row -->
					<div class="row">
						<div class="col-sm-9">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><center>Add HRM</center></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="post" action="<?php echo base_url('admin/create_relation'); ?>">
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Super advisor</label>
														<select name="parent" class="form-control" required>
															<option value="">--Select Super advisor--</option>
															<?php
															
															$query=$this->db->select("*")->from('hrm')
																						->where('HRM_TYPE_ID ',2)	
															                             ->get()->result();
															foreach ($query as $row) 
															{
																$name=$row->HRM_TITLE." ".$row->HRM_FIRST_NAME." ".$row->HRM_MIDDLE_NAME." ".$row->HRM_LAST_NAME;
																echo "<option value='".$row->HRM_ID."'>".$name."</option>";
															}

															?>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Advisor</label>
														<select name="child" class="form-control" required>
															<option value="">--Select Advisor--</option>
															<?php
															$query=$this->db->select("*")->from('hrm')
																						->where('HRM_TYPE_ID',1)
																						 ->get()->result();

															foreach ($query as $row) 
															{
																$name=$row->HRM_TITLE." ".$row->HRM_FIRST_NAME." ".$row->HRM_MIDDLE_NAME." ".$row->HRM_LAST_NAME;
																echo "<option value='".$row->HRM_ID."'>".$name."</option>";
															}

															?>
														</select>
													</div>													
												</div>

												

												<div class="form-group mb-30">
													<input class="btn btn-primary btn-md" type="submit" name="submit">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					</div>
				</div>
				
				