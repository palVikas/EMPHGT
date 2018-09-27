				<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Add Branch</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Add Branch</span></li>
							  </ol>
							</div>
							<!-- /Breadcrumb -->
						</div>
						<!-- Row -->
					<div class="row">
						<div class="col-sm-10">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><center>Add Branch</center></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('admin/register_branch');?>" method="post">
												<div class="row">
													<div class="col-md-6 form-group">
														<label class="control-label mb-10 text-left">Company name</label>
														<select class="form-control" name="company" required>
															<option value="">--Select company--</option>
															<?php
															    $data=$this->db->select('*')->from('company')->get()->result();
															    foreach ($data as  $d) 
															    {
															    	echo "<option value='".$d->COMPANY_ID."'>".$d->COMPANY_NAME."</option>";
															    }
															?>
														</select>
													</div>
													<div class="col-md-6 form-group">
														<label class="control-label mb-10 text-left">Branch catagory</label>
														<select class="form-control" name="category" required>
															<option value="">--Select catagory--</option>
															<?php
															    $data=$this->db->select('*')->from('branch_category')->get()->result();
															    foreach ($data as  $d) 
															    {
															    	echo "<option value='".$d->BRANCH_CATEGORY_ID."'>".$d->BRANCH_CATEGORY_NAME."</option>";
															    }
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													
												</div>

												<div class="row">
													<div class="form-group col-md-9 col-sm-6">
														<label class="control-label mb-10 text-left">Branch name</label>
														<input type="text" class="form-control" name="branch_name" required>
													</div>

													<div class="form-group col-md-3 col-sm-6">
														<label class="control-label mb-10 text-left">Prefix</label>
														<input type="text" class="form-control" name="prefix" required>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label mb-10 text-left" for="example-email">Address</label>
													<input type="text" id="example-email" name="address" class="form-control" required>
												</div>
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">City</label>
														<select name="city" class="form-control" required>
															<option value="">--select city--</option>
															<?php 
																$data=$this->db->select('*')->from('cities')->get()->result();
																foreach ($data as $d) 
																{
																	echo "<option value='".$d->CITY_ID."'>".$d->CITY_NAME."</option>";
																}


															 ?>
														</select>
													</div>

													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Phone no</label>
														<input type="text" class="form-control" name="phone">
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Contact</label>
														<input type="number" name="contact" class="form-control" required>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Alt. contact</label>
														<input type="number" class="form-control" name="alt_cont">
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Target</label>
														<input type="number" name="target" class="form-control">
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Reg date</label>
														<input type="date" class="form-control" name="reg_date" required>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Username</label>
														<input type="text" name="user" class="form-control" required>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Password</label>
														<input type="Password" class="form-control" name="pass" required>
													</div>
												</div>
												
															
											
												<!--<div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Logo</label>
													<div class="fileinput fileinput-new input-group" data-provides="fileinput">
														<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
														<input type="file" name="...">
														</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
													</div>
												</div>-->
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